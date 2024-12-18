<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('perPage', 10);
        $categories = Category::paginate($perPage);
        return view('category.index')->with('danhsachloai', $categories);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return redirect()->route('category.index');
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('category.update')->with('category', $category);
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return redirect()->route('category.index');
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);
        if($category) {
            $category->delete();
            return redirect()->route('category.index');
        }
        return redirect()->route('category.index');
    }
}
