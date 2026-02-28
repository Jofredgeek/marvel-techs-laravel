<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Quote;
use App\Models\Service;
use App\Models\Post;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'contacts' => Contact::count(),
            'quotes' => Quote::count(),
            'services' => Service::count(),
            'posts' => Post::count(),
            'projects' => Project::count(),
            'newContacts' => Contact::where('read', false)->count(),
            'newQuotes' => Quote::where('read', false)->count(),
        ];
        $recentContacts = Contact::latest()->take(5)->get();
        $recentQuotes = Quote::latest()->take(5)->get();
        return view('admin.dashboard', compact('stats', 'recentContacts', 'recentQuotes'));
    }
}