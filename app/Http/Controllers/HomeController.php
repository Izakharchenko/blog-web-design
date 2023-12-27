<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
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

    public function index(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'nullable|int',
        ]);

        $posts = Post::with('user')->when($request->has('category_id'), function ($q) use ($data) {
            $q->where('category_id', $data['category_id']);
        })->orderBy('created_at', 'desc')->simplePaginate(10);

        return view('welcome', compact('posts'));
    }

    public function show(Post $post)
    {
        $post = Post::with('comments', 'user', 'tags')->find($post->id);
        return view('show', compact('post'));
    }

    public function categories()
    {
        // $category = Category::select('id', 'title')->get();
        // return
    }
}
