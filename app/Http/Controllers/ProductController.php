<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
 
    public function index()
    {
        $viewBag['products'] = Product::orderBy('id','desc')->get();
        return view('products.index', $viewBag);
    }

  
    public function create()
    {
        
        $viewBag['categorys'] = Category::all();
        $viewBag['brands'] = Brand::all();
        $viewBag['sizes'] = Size::all();
        $viewBag['colors'] = Color::all();
        return view('products.create',$viewBag);
    }

  
    public function store(Request $request)
    {
       dd($request);
    }

 
    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    
    public function destroy(Product $product)
    {
        //
    }
}
