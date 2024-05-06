<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index() //products list
    {
        $products = Product::latest()->get();
        return view('product.showList', compact('products'));
    }

    public function show()
    {
        $users = auth()->user();
        $products = Product::latest()->get();
        return view('product.showProduct', compact('users', 'products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products,name,NULL,id,description,' . $request->description,
            'description' => 'required|max:255',
            'image' =>  'nullable|image',
            'product_status' => 'required|in:in-stock,out-of-stock',
            'price' => 'required',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product-images', 'public');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'product_status' => $request->product_status,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        $notification = array(
            'message' => "Product added successfully",
            'alert-type' => 'success',
        );

        return redirect()->route('product.show')->with($notification);
    }

    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('product.edit', compact('products'));
    }

    public function update(Request $request, Product $products)
    {
        $product_id = $products->id;

        Product::findOrFail($product_id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        $notification = array(
            'message' => "Product Updated Successfully",
            'alert-type' => 'success',
        );

        return redirect()->route('product.showList')->with($notification);
    }



    // public function update(Request $request)
    // {
    //     $product_id = $request->id;
    //     $product = Product::findOrFail($product_id);

    //     $imagePath = $product->image;
    //     $deletedImagePath = null;

    //     if ($request->hasFile('image')) {
    //         // Move old image to deleted folder
    //         if ($imagePath && Storage::disk('public')->exists($imagePath)) {
    //             $deletedImagePath = str_replace('product-images/', 'product-images-deleted/', $imagePath);
    //             Storage::disk('public')->move($imagePath, $deletedImagePath);
    //         }
    //         // Store new image
    //         $imagePath = $request->file('image')->store('product-images', 'public');
    //     }

    //     $product->update([
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'product_status' => $request->product_status,
    //         'price' => $request->price,
    //         'image' => $imagePath,
    //     ]);

    //     $notification = [
    //         'message' => "Product updated successfully",
    //         'alert-type' => 'success',
    //     ];

    //     return redirect()->route('product.index')->with($notification);
    // }

    //     public function update(Request $request)
    // {
    //     $product_id = $request->id;
    //     $product = Product::findOrFail($product_id);

    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image');
    //         $image_name = date('YmdHi') . "." . $imagePath->getClientOriginalName();
    //         $imagePath->move(public_path('storage/product_images'), $image_name);

    //         // Remove old image if exists
    //         if ($product->image) {
    //             @unlink(public_path('storage/product_images/' . $product->image));
    //         }

    //         $product->image = $image_name;
    //     }

    //     $product->name = $request->name;
    //     $product->description = $request->description;
    //     $product->product_status = $request->product_status;
    //     $product->price = $request->price;
    //     $product->save();

    //     $notification = [
    //         'message' => "Product updated successfully",
    //         'alert-type' => 'success',
    //     ];

    //     return redirect()->route('product.index')->with($notification);
    // }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}




// {
//







//     public function update(Request $request)
//     {
//         $inventory_id = $request->id;

//         Inventory::findOrFail($inventory_id)->update([
//             'name' => $request->name,
//             'type' => $request->type,
//             'quantity' => $request->quantity,
//             'description' => $request->description,
//             'price' => $request->price,
//         ]);

//         $notification = array(
//             'message' => "Your inventory has been updated successfully",
//             'alert-type' => 'success',
//         );

//         return redirect()->route('inventory.index')->with($notification);
//     }


// }
