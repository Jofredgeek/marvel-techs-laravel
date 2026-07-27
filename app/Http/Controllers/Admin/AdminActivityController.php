<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteActivity;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminActivityController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'category' => ['nullable', Rule::in(['traffic', 'security', 'users', 'content', 'inbox', 'system'])],
            'period' => ['nullable', Rule::in(['today', '7days', '30days'])],
        ]);

        $activities = SiteActivity::query()
            ->with('user:id,name,email,phone,is_admin')
            ->when($filters['q'] ?? null, function ($query, string $search): void {
                $query->where(function ($query) use ($search): void {
                    $query->where('description', 'like', "%{$search}%")
                        ->orWhere('route', 'like', "%{$search}%")
                        ->orWhereHas('user', function ($query) use ($search): void {
                            $query->where('name', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%");
                        });
                });
            })
            ->when($filters['category'] ?? null, fn ($query, string $category) => $query->where('category', $category))
            ->when(($filters['period'] ?? null) === 'today', fn ($query) => $query->where('created_at', '>=', today()))
            ->when(($filters['period'] ?? null) === '7days', fn ($query) => $query->where('created_at', '>=', now()->subDays(7)))
            ->when(($filters['period'] ?? null) === '30days', fn ($query) => $query->where('created_at', '>=', now()->subDays(30)))
            ->latest()
            ->paginate(30)
            ->withQueryString();

        $stats = [
            'today' => SiteActivity::where('created_at', '>=', today())->count(),
            'views' => SiteActivity::where('event', 'page_view')->where('created_at', '>=', today())->count(),
            'logins' => SiteActivity::where('event', 'login')->where('created_at', '>=', today())->count(),
            'failed' => SiteActivity::where('event', 'login_failed')->where('created_at', '>=', today())->count(),
        ];

        return view('admin.activities.index', compact('activities', 'stats', 'filters'));
    }
}
