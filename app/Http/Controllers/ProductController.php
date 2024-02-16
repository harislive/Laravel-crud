<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('products.index',[
            'products' => Product::latest()->paginate(10)->onEachSide(0),
        ]);
    }

    public function create(): View
    {
       return view('products.create');
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        Product::create($request->safe()->except('image') + ['image' => $request->file('image')->store('products','public')]);

        return to_route('products.index')->with('success','Product created successfully');
    }

    public function show(Product $product): View
    {
        return view('products.show',[
            'product' => $product,
        ]);
    }

    public function edit(Product $product): View
    {
        return view('products.edit',[
            'product' => $product,
        ]);
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->safe()->except('image'));

        if($request->file('image')) {
            Storage::disk('public')->delete($product->image);
            $product->update(['image' => $request->file('image')->store('products','public')]);
        }

        return to_route('products.index')->with('success','Product updated successfully');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return back()->with('success','Product deleted successfully');
    }
}
