<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if (!Gate::allows('product_list')) {
            return abort(401);
        }
        $products = Product::query();

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $fromDate = $request->from_date;
            $toDate = $request->to_date;

            $products->whereBetween('created_at', [$fromDate, $toDate]);
        }

        $products = $products->orderBy('id', 'desc')->paginate(5);
        $filter = $request->only(['from_date', 'to_date']);
        return view('products.index', compact('products', 'filter'));
    }

    public function create()
    {
        if (!Gate::allows('product_create')) {
            return abort(401);
        }
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
        if (!Gate::allows('product_edit')) {
            return abort(401);
        }
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
