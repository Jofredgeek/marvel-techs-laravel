<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->orderBy('sort_order')->get();
        $projects = Project::where('featured', true)->latest()->take(6)->get();

        return view('home.index', compact('services', 'projects'));
    }
}