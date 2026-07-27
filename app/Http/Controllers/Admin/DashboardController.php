<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Project;
use App\Models\Quote;
use App\Models\Service;
use App\Models\SiteActivity;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'contacts' => Contact::count(),
            'quotes' => Quote::count(),
            'services' => Service::count(),
            'posts' => Post::count(),
            'projects' => Project::count(),
            'newContacts' => Contact::where('read', false)->count(),
            'newQuotes' => Quote::where('read', false)->count(),
            'users' => User::count(),
            'newUsers' => User::where('created_at', '>=', now()->startOfMonth())->count(),
            'pageViewsToday' => SiteActivity::where('event', 'page_view')->where('created_at', '>=', today())->count(),
            'activityToday' => SiteActivity::where('created_at', '>=', today())->count(),
        ];

        $activityCounts = SiteActivity::where('created_at', '>=', today()->subDays(6))
            ->get(['created_at'])
            ->countBy(fn (SiteActivity $activity) => $activity->created_at->toDateString());

        $activityTrend = collect(range(6, 0))->map(function (int $daysAgo) use ($activityCounts): array {
            $date = today()->subDays($daysAgo);

            return [
                'date' => $date,
                'label' => $date->translatedFormat('D'),
                'value' => $activityCounts->get($date->toDateString(), 0),
            ];
        });

        $recentActivities = SiteActivity::with('user:id,name,email,phone')
            ->latest()
            ->take(9)
            ->get();

        $topPages = SiteActivity::query()
            ->selectRaw('route, COUNT(*) as total')
            ->where('event', 'page_view')
            ->whereNotNull('route')
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('route')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        $authMethods = [
            'email' => User::whereNotNull('email')->whereNull('google_id')->count(),
            'google' => User::whereNotNull('google_id')->count(),
            'phone' => User::whereNotNull('phone')->whereNull('email')->count(),
        ];

        return view('admin.dashboard', compact(
            'stats',
            'activityTrend',
            'recentActivities',
            'topPages',
            'authMethods',
        ));
    }
}
