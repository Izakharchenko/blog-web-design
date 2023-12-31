<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Requests\StoreTagRequest;



class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(15);

        return view('dashboard.tag.index', compact('tags'));
    }


    public function create()
    {
        return view('dashboard.tag.create');
    }


    public function store(StoreTagRequest $request)
    {
        $validated = $request->validated();

        $tag = Tag::create($validated);
        $tag->save();

        return redirect()->route('tags.index')->with('success', 'Тег додано');
    }

 
    public function show(Tag $tag)
    {
        return view('dashboard.tag.show', compact('tag'));
    }


    public function edit(Tag $tag)
    {
        return view('dashboard.tag.edit', compact('tag'));
    }


    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $validated = $request->validated();

        $tag->update($validated);

        return redirect()->route('tags.index', 200)->with('success', 'Тег оновлено');
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')->with('success', "Тег $tag->title видалено");
    }
}
