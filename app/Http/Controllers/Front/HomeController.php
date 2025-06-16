<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'posts' => Post::paginate(9),
        ]);
    }

    public function show(string $id)
    {
        $post = Post::where('slug', $id)->first();
        return view('post',[
            'post' => $post,
        ]);
    }
}
