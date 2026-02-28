<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderByDesc('year')->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.form', ['project' => new Project(), 'action' => 'create']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:200',
            'client' => 'required|string|max:200',
            'year' => 'required|integer|min:2000|max:2099',
            'tags' => 'nullable|string',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'cover_image' => 'nullable|string|max:10',
            'featured' => 'nullable|boolean',
        ]);
        $data['slug'] = Str::slug($data['title']);
        $data['tags'] = $data['tags'] ? array_filter(array_map('trim', explode(',', $data['tags']))) : null;
        $data['featured'] = $request->has('featured');
        Project::create($data);
        return redirect()->route('admin.projects.index')->with('success', 'Projet créé.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', ['project' => $project, 'action' => 'edit']);
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:200', 'client' => 'required|string|max:200',
            'year' => 'required|integer', 'tags' => 'nullable|string',
            'excerpt' => 'required|string|max:500', 'content' => 'required|string',
            'cover_image' => 'nullable|string|max:10',
        ]);
        $data['tags'] = $data['tags'] ? array_filter(array_map('trim', explode(',', $data['tags']))) : null;
        $data['featured'] = $request->has('featured');
        $project->update($data);
        return redirect()->route('admin.projects.index')->with('success', 'Projet mis à jour.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé.');
    }
}