<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(CreateProductRequest $request)
    {
        $product = Product::create($request->validated());

        $product->categories()->attach($request->input('categories'));

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
    
        if ($product->delete()) {
            return redirect()->route('products.index')->with('success', 'Product deleted successfully');
        } else {
            return redirect()->route('products.index')->with('error', 'Failed to delete the product');
        }
    }
}
