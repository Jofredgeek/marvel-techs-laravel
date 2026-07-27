<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'role' => ['nullable', Rule::in(['admin', 'customer'])],
            'method' => ['nullable', Rule::in(['email', 'google', 'phone'])],
        ]);

        $users = User::query()
            ->when($filters['q'] ?? null, function ($query, string $search): void {
                $query->where(function ($query) use ($search): void {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                });
            })
            ->when(($filters['role'] ?? null) === 'admin', fn ($query) => $query->where('is_admin', true))
            ->when(($filters['role'] ?? null) === 'customer', fn ($query) => $query->where('is_admin', false))
            ->when(($filters['method'] ?? null) === 'google', fn ($query) => $query->whereNotNull('google_id'))
            ->when(($filters['method'] ?? null) === 'phone', fn ($query) => $query->whereNotNull('phone')->whereNull('email'))
            ->when(($filters['method'] ?? null) === 'email', fn ($query) => $query->whereNotNull('email')->whereNull('google_id'))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $stats = [
            'total' => User::count(),
            'admins' => User::where('is_admin', true)->count(),
            'active' => User::where('last_seen_at', '>=', now()->subDays(30))->count(),
            'newThisMonth' => User::where('created_at', '>=', now()->startOfMonth())->count(),
        ];

        return view('admin.users.index', compact('users', 'stats', 'filters'));
    }

    public function updateRole(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'role' => ['required', Rule::in(['admin', 'customer'])],
        ]);

        if ($user->is($request->user()) && $validated['role'] !== 'admin') {
            return back()->withErrors([
                'role' => 'Vous ne pouvez pas retirer votre propre accès administrateur.',
            ]);
        }

        if ($user->is_admin && $validated['role'] !== 'admin' && User::where('is_admin', true)->count() <= 1) {
            return back()->withErrors([
                'role' => 'Le site doit conserver au moins un administrateur.',
            ]);
        }

        $user->forceFill([
            'is_admin' => $validated['role'] === 'admin',
        ])->save();

        return back()->with('success', "Le rôle de {$user->name} a été mis à jour.");
    }
}
