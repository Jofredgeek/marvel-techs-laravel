<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $category = request('category');
        $posts = Post::published()
            ->when($category, fn($q) => $q->where('category', $category))
            ->orderByDesc('published_at')
            ->paginate(9);

        return view('blog.index', compact('posts'));
    }

    public function show(string $slug)
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();
        $relatedPosts = Post::published()
            ->where('category', $post->category)
            ->where('id', '!=', $post->id)
            ->take(2)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }
}