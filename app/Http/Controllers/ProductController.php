<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariation;

class ProductController extends Controller
{
    public function create()
    {
        return view('admin.products.create');
    }
    public function index()
    {
        $products = Product::all(); // Lấy danh sách sản phẩm chưa bị xóa
        return view('admin.products.index', compact('products'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete(); // Xóa mềm

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'variations.*.type' => 'required|string|max:255',
            'variations.*.value' => 'required|string|max:255',
            'variations.*.price' => 'required|numeric|min:0',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        foreach ($request->variations as $variation) {
            ProductVariation::create([
                'product_id' => $product->id,
                'variation_type' => $variation['type'],
                'variation_value' => $variation['value'],
                'price' => $variation['price'],
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
}
