<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Notifications\ProductDeletedNotification;
use App\Notifications\ProductUpdatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $category_id)
    {
        // Retrieve products belonging to the specified category
        $products = Product::where('category_id', $category_id)->latest()->get();
        return response()->json(['products' => $products], 200);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $category_id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|unique:products,name',
            'description' => 'required|max:255',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        // Create and save the new product
        $product = Product::create([
            'name' => $request->name,
            'category_id' => $category_id,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        // Return the newly created product
        return response()->json(['product' => $product], 201);
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $category_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id, $id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Validate the request data
        $request->validate([
            'name' => 'required|unique:products,name,' . $id,
            'description' => 'required|max:255',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        // Update the product with the new data
        $product->update([
            'name' => $request->name,
            'category_id' => $category_id,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        // Notification::send($product->user, new ProductUpdatedNotification($product));
        // $product->user->notify(new ProductUpdatedNotification($product));

        // if ($product->user) {
        //     $product->user->notify(new ProductUpdatedNotification($product));
        // } else {
        //     return response()->json([
        //         'error' => 'User not found for the product. Notification not sent.',
        //     ], 404);
        // }

        // $userId = auth()->id();

        // // Trigger the update notification
        // $user = User::find($userId);
        // if ($user) {
        //     $user->notify(new ProductUpdatedNotification($product));
        // } else {
        //     // Handle the case where the user is null or not found
        //     return response()->json([
        //         'error' => 'Authenticated user not found. Notification not sent.',
        //     ], 404);
        // }

        // // Return the updated product
        // // return response()->json(['product' => $product], 200);
        // return response()->json([
        //     'product' => $product,
        //     'message' => 'Product updated successfully. Notification sent to user.',
        // ], 200);
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id, $id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Delete the product
        $product->delete();

        // Notification::send($product->user, new ProductDeletedNotification($product));

        // Return a success response
        return response()->json(null, 204);
    }
}
