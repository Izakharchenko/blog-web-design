<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $posts = Post::with('user')->simplePaginate(10);

        return view('welcome', compact('posts'));
    }

    public function show(Post $post)
    {
        $post = Post::with('comments', 'comments.user', 'user')->find($post->id);
        return view('show', compact('post'));
    }
}
