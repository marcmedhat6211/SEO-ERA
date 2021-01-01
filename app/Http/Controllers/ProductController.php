<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();

        return view('products.index', [
            'products' => $products,
        ]);
    }

    public function create() {
        $products = Product::all();

        return view('products.create', [
            'products' => $products
        ]);
    }

    public function store(ProductRequest $request) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        $file->move('images/', $fileName);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $fileName,
            'price' => $request->price,
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }

    public function edit($id) {
        $product = Product::find($id);
        
        return view('products.edit')->with('product', $product);
    }

    public function update(ProductRequest $request, $id) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        $file->move('images/', $fileName);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->image = $fileName;
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product Updated successfully');
    }

    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted');
    }
}
