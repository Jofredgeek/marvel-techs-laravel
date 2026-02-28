<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Js;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::orderByDesc('year')->get();
        return view('portfolio.index', compact('projects'));
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('portfolio.show', compact('project'));
    }
}