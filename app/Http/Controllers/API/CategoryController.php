<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function index()
    // {
    //     $categories = Category::all();
    //     return response()->json($categories);
    // }

    public function index()
    {
        $categories = Category::latest()->get();
        return response()->json(['categories' => $categories], 200);
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string',
    //     ]);

    //     $category = Category::create($validatedData);
    //     return response()->json($category, 201);
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        $category = Category::create([
            'name' => $request->name,
        ]);

        return response()->json(['category' => $category], 201);
    }


    // public function update(Request $request, $id)
    // {

    //     $category = Category::findOrFail($id);
    //     $category->update($request->all());
    //     return response()->json($category, 200);
    // }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return response()->json(['category' => $category], 200);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        if (!$category) {
            return response()->json('Category not found.', 404);
        }
        return response()->json(null, 204);
    }

    // public function destroy($id)
    // {
    //     $category = Category::findOrFail($id);
    //     $category->delete();

    //     return response()->json(null, 204);
    // }
}
