<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('category.showCategory', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        Category::insert([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => "Category added successfully",
            'alert-type' => 'success',
        );

        return redirect()->route('category.showList')->with($notification);
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, $id)
    {
        $categories = Category::findOrFail($id);
        return view('category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => "Category updated successfully",
            'alert-type' => 'success',
        );

        return redirect()->route('category.showList')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'category Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
