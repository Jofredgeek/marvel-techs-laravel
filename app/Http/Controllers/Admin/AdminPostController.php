<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('published_at')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.form', ['post' => new Post(), 'action' => 'create']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:200',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category' => 'required|string|max:100',
            'tags' => 'nullable|string',
            'cover_image' => 'nullable|string|max:10',
            'published_at' => 'nullable|date',
        ]);
        $data['slug'] = Str::slug($data['title']);
        $data['tags'] = $data['tags'] ? array_filter(array_map('trim', explode(',', $data['tags']))) : null;
        $data['active'] = $request->has('active');
        Post::create($data);
        return redirect()->route('admin.posts.index')->with('success', 'Article créé.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.form', ['post' => $post, 'action' => 'edit']);
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:200', 'excerpt' => 'required|string|max:500',
            'content' => 'required|string', 'category' => 'required|string|max:100',
            'tags' => 'nullable|string', 'cover_image' => 'nullable|string|max:10',
            'published_at' => 'nullable|date',
        ]);
        $data['tags'] = $data['tags'] ? array_filter(array_map('trim', explode(',', $data['tags']))) : null;
        $data['active'] = $request->has('active');
        $post->update($data);
        return redirect()->route('admin.posts.index')->with('success', 'Article mis à jour.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Article supprimé.');
    }
}