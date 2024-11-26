<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role=='Admin'){
            $products = Product::paginate(25);
        }
        else{
            $products = Product::where('user_id', Auth::user()->id)->paginate(25);
        }
        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        return view('dashboard.products.create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(request()->hasFile('cover')){
            $extension = request()->file('cover')->getClientOriginalExtension();
            $path = uniqid() . time() . '.' . $extension;
            request()->file('cover')->storeAs('/products', $path);
        }
        Product::create([
            "user_id"=>Auth::user()->id,
            "name"=>request('name'),
            "path"=>$path,
            "price"=>request('price'),
            "brand_id"=>request('brand_id'),
            "description"=>request('description'),
            "category"=>request('category'),
            "engine_hours"=>request('engine_hours'),
            "yop"=>request('yop'),
            "qty"=>1,
            "shipping"=>request('shipping'),
            "implement"=>request('implement'),
            "isAvailable"=>true
        ]);
        return back()->with('message','Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
