<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('prod.product.index',compact('products'));
        // return view('prod.product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prod.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create([
            'number'=>$request->number,
            'name'=>$request->name,
            'price'=>$request->price,
            'brand'=>$request->brand,
        ]);
        return redirect()->route('products.create')->with('success','Product was added successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("prod.product.show",compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view("prod.product.edit",compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->number = $request->number;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->brand = $request->brand;
        $product->update();
        return redirect()->route('products.index')->with('success','Product was edited successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Product was deleted successfully !');
    }
}
