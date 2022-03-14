<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\product\StoreProductRequest;
use App\Http\Requests\product\UpdateProductRequest;


class ProductController extends Controller
{

    public function index()
    {
        $viewBag['products'] = Product::orderBy('id', 'desc')->get();
        return view('products.index', $viewBag);
    }


    public function create()
    {

        $viewBag['categorys'] = Category::all();
        $viewBag['brands'] = Brand::all();
        $viewBag['sizes'] = Size::all();
        $viewBag['colors'] = Color::all();
        return view('products.create', $viewBag);
    }


    public function store(StoreProductRequest $request)
    {
        $photo = $request->product_img;
        $photoname = uniqid() . '.' . $photo->getClientOriginalExtension();
        Image::make($photo)->resize(320, 240)->save(public_path('files/images/' . $photoname));

        $slug = Str::slug($request->product_name, '-');
        try {
            $product = new Product();
            $product->category_id  = $request->category_id;
            $product->brand_id   = $request->brand_id;
            $product->size_id   = $request->size_id;
            $product->color_id   = $request->color_id;
            $product->product_name  = $request->product_name;
            $product->product_sku  = $request->product_sku;
            $product->name_slug  = $slug;
            $product->product_img = 'files/images/' . $photoname;
            $product->product_buy_price  = $request->product_buy_price;
            $product->product_sell_price  = $request->product_sell_price;
            $product->product_stock  = $request->product_stock;
            $product->product_description  = $request->product_description;
            $product->status = $request->status;

            $product->save();

            flash('product Successfully added.')->success();
            return redirect()->route('products.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $viewBag['categories'] = Category::all();
        $viewBag['brands'] = Brand::all();
        $viewBag['sizes'] = Size::all();
        $viewBag['colors'] = Color::all();
        $viewBag['product'] = $product;
        return view('products.edit',$viewBag);
    }

    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        unlink($product->product_img);
        $product->delete();
        flash('Product Delete Successfully ')->success();
    return redirect()->route('products.index');
    }
}
