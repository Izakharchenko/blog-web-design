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
            'tag_id' => 'nullable|int',
        ]);

        $posts = Post::with('user', 'tags')->when($request->has('category_id'), function ($q) use ($data) {
            $q->where('category_id', $data['category_id']);
        })
        // ->whereHas('tags', function($q) use($data) {
        //     $q->where('tag_id',  $data['tag_id']);
        // })
        // ->when($request->has('tag_id'), function ($q) use ($data) {
        //     $q->tags()->where('id', $data['tag_id']);
        // })
        ->orderBy('created_at', 'desc')
        ->simplePaginate(10);

        return view('welcome', compact('posts'));
    }

    public function show(Post $post)
    {
        $post = Post::with('comments', 'user', 'tags')->find($post->id);
        return view('show', compact('post'));
    }

    

    public function tags(Request $request)
    {
        $data = $request->validate([
            'tag_id' => 'nullable|int',
        ]);

        $posts = Post::with('user', 'tags')
        ->whereHas('tags', function($q) use($data) {
            $q->where('tag_id',  $data['tag_id']);
        })
        ->orderBy('created_at', 'desc')
        ->simplePaginate(10);

        return view('welcome', compact('posts'));
    }
}
