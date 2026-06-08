<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product; 


class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create($validatedData);

        return redirect()->route('admin.categories.index')->with('success', 'Kategorie byla úspěšně vytvořena!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validatedData = $request->validate([
            'name' => [
                'required', 
                'string', 
                'max:255', 
                'unique:categories,name,' . $category->id         
                ],
        ]);

        $category->update($validatedData);

        return redirect()->route('admin.categories.index')->with('success', 'Kategorie byla úspěšně upravena!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Kategorie byla úspěšně smazána!');
    }
}
