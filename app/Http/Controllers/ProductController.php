<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        $products = Product::withCount('images')->with('images')
        ->latest()->limit(5)->get();
        // $products = Product::where("name","Cola")
        // ->where("price",">=","150")
        // ->where('name',"like","%a%")
        // ->where("brand","<>","Pepsi")
        // ->withCount('images')
        // ->with('images')
        // ->paginate();
        return view('product.index',compact('products'));
        // return view('product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'number' =>'required|unique:products|min:5|max:5',
            'name' =>'required|max:50',
            'price' =>'required|numeric',
            'image' =>'image',
        ]);
        
        $product =  Product::create([
            'number'=>$request->number,
            'name'=>$request->name,
            'price'=>$request->price,
            'brand'=>$request->brand,
        ]);
        if($request->file('images')){
            foreach ($request->file('images') as $key => $image) {
                $newFileName = time() ."$key .". $image->getClientOriginalExtension();
                $image->move(public_path('images'), $newFileName);
                Image::create([
                    'product_id' => $product->id,
                    'path'=>$newFileName
                ]);
            }
        }
       
        return redirect()->route('products.index')->with('success','Product was added successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("product.show",compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view("product.edit",compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'number' =>'required|min:5|max:5',
            'name' =>'required',
            'price' =>'required',
        ]);
        $product->number = $request->number;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->brand = $request->brand;
        $product->update();
        if($request->file('images')){
            if($product->images){
                foreach ($product->images as $key => $image) {
                    File::delete("images/$image->path");
                    $image->delete();
                }
            }
            foreach ($request->file('images') as $key => $image) {
                $newFileName = time() ."$key .". $image->getClientOriginalExtension();
                $image->move(public_path('images'), $newFileName);
                Image::create([
                    'product_id' => $product->id,
                    'path'=>$newFileName
                ]);
            }
        }
      

        


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


    function toggleAvailablity (Product $product) {
        $product->is_available = !$product->is_available;
        $product->update();
        return redirect()->route('products.index')->with('success','Product was toggled successfully !');
    }
}
