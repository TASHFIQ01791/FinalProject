<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Bid;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use DB;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $products = Product::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('description', 'like', "%{$search}%")
                         ->orWhere('start_bid', 'like', "%{$search}%")
                         ->orWhere('regular_price', 'like', "%{$search}%");
        })
      //  ->whereDoesntHave('confirmedBids') // Exclude products with confirmed bids
        ->paginate(3);

        return view('admin.products.products', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.product_create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'product_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_bid' => 'required|numeric',
            'regular_price' => 'required|numeric|gte:start_bid',
            'bid_end_datetime' => 'required|date|after:now',
            'category_id' => 'required|exists:categories,id',
        ], [
            'regular_price.gte' => 'The regular price must be higher than the start bid.',
            'bid_end_datetime.after' => 'The bid end date and time must be a future date.',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        if ($request->hasFile('product_img')) {
            $imageName = time().'.'.$request->product_img->extension();
            $request->product_img->move(public_path('product_images'), $imageName);
            $product->product_img = 'product_images/' . $imageName;
        } else {
            $product->product_img = null; // Set to null if no image is uploaded
        }

        $product->start_bid = $request->start_bid;
        $product->regular_price = $request->regular_price;
        $product->bid_end_datetime = $request->bid_end_datetime;
        $product->save();

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.product_edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'product_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_bid' => 'required|numeric',
            'regular_price' => 'required|numeric|gte:start_bid',
            'bid_end_datetime' => 'required|date|after:now',
            'category_id' => 'required|exists:categories,id',
        ], [
            'regular_price.gte' => 'The regular price must be higher than the start bid.',
            'bid_end_datetime.after' => 'The bid end date and time must be a future date.',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        if ($request->hasFile('product_img')) {
            if (File::exists(public_path($product->product_img))) {
                File::delete(public_path($product->product_img));
            }

            $imageName = time().'.'.$request->product_img->extension();
            $request->product_img->move(public_path('product_images'), $imageName);
            $product->product_img = 'product_images/' . $imageName;
        }

        $product->start_bid = $request->start_bid;
        $product->regular_price = $request->regular_price;
        $product->bid_end_datetime = $request->bid_end_datetime;
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if (File::exists(public_path($product->product_img))) {
            File::delete(public_path($product->product_img));
        }

        $product->delete();
        return redirect()->route('admin.products.index');
    }

}
