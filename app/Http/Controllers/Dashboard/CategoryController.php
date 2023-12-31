<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(15);

        return view('dashboard.category.index', compact('categories'));
    }


    public function create()
    {
        return view('dashboard.category.create');
    }


    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        $category = Category::create($validated);
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Категорію додано');
    }


    public function show(Category $category)
    {
        return view('dashboard.category.show', compact('category'));
    }


    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

 
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();

        $category->update($validated);

        return redirect()->route('categories.index', 200)->with('success', 'Категорію оновлено');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', "Категорія $category->title видалена");
    }
}
