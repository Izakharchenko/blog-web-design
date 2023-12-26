<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\PostTag;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(10);
        
        return view('dashboard.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboard.post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required | string',
            'text' => 'required | string',
            'cover' => 'required | string',
            'category_id' => 'required ',
            'tags' => 'required ', 
        ]);
    
        $tags = $data['tags'];
        unset($data['tags']);
    
        $post = Post::create($data);
        $post->tags()->attach($tags);
        return redirect()->route('post.index');
    }
    

    public function show(Post $post){
        return view('dashboard.post.show', compact('post'));
    }

    public function edit(Post $post){
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboard.post.edit', compact('post','categories','tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'text' => 'string',
            'cover' => 'string',
            'category_id' => '',
            'tags' => 'required ',

        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->attach($tags);
        return redirect()->route('post.show', $post->id);
    }



    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('post.index');
    }

}
