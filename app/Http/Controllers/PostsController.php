<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.edit');
    }

    public function store(PostRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = base64_encode(file_get_contents($request->file('image')->path()));

        Post::query()->create($validated);

        return redirect()->route('home');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $validated = $request->validated();
        if ($request->file('image') !== null) {
            $validated['image'] = base64_encode(file_get_contents($request->file('image')->path()));
        }

        $post->update($validated);

        return redirect()->route('home');
    }

    public function destroy(Post $post)
    {
        $post->update(['image' => '']);
        return redirect()->route('home');
    }
}
