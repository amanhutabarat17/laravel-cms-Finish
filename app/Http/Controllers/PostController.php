<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index', array('posts' => $posts));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            $data['image'] = "/storage/" . $imagePath;
        }

        $data['user_id'] = auth()->id();
        Post::create($data);
        return redirect()->route('post.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            $data['image'] = "/storage/" . $imagePath;
        }

        $post = Post::findOrFail($id);
        $post->update($data);
        return redirect()->route('post.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post updated successfully.');
    }
}
