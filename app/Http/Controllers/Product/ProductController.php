<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('storage/products'), $imageName);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'image' => $imageName,
        ]);

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        Product::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return redirect()->route('products.index');
    }
}
