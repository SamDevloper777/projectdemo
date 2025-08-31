<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
     public function index() {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create() {
        return view('admin.products.create');
    }
public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:csv,xlsx,xls|max:204800', 
    ]);

    $path = $request->file('file')->store('imports');

    Excel::queueImport(new ProductsImport, $path);

    return back()->with('success', 'product imported successfully');
}


    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048'
        ]);

        if($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products','public');
        } else {
            $validated['image'] = 'default.png'; 
        }

        Product::create($validated);
        return redirect()->route('admin.products.index')->with('success','Product created!');
    }

    public function edit(Product $product) {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048'
        ]);

        if($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products','public');
        }

        $product->update($validated);
        return redirect()->route('admin.products.index')->with('success','Product updated!');
    }

    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success','Product deleted!');
    }
}
