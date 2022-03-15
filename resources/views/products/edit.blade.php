@extends('layouts.mastar')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Product </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Product List</a> </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Product</h3>
                </div>
                <form  action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row ">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">category</label>
                                <select class="form-control" name="category_id" required="">
                                    <option selected="" disabled="">== Choose Category ==</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" <?php if ($category->id == $product->category_id) {  echo 'selected';} ?>>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Brand</label>
                                <select class="form-control" name="brand_id" required="">
                                    <option selected="" disabled="">== Choose Brand ==</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}" <?php if ($brand->id == $product->brand_id) { echo 'selected';} ?>>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('brand_id'))
                                    <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Size</label>
                                <select class="form-control" name="size_id" required="">
                                    <option selected="" disabled="">== Choose Size ==</option>
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size->id }}" <?php if ($size->id == $product->size_id) {   echo 'selected';} ?>>
                                            {{ $size->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('size_id'))
                                    <span class="text-danger">{{ $errors->first('size_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Color</label>
                                <select class="form-control" name="color_id" required="">
                                    <option selected="" disabled="">== Choose Color ==</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}" <?php if ($color->id == $product->color_id) { echo 'selected';} ?>>
                                            {{ $color->color_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('color_id'))
                                    <span class="text-danger">{{ $errors->first('color_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for=""> Product Name</label>
                                <input type="text" class="form-control" id="" value="{{ $product->product_name }}"
                                    name="product_name" placeholder="Enter Product Name ">
                                @if ($errors->has('product_name'))
                                    <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">SKU</label>
                                <input type="text" class="form-control" id="" value="{{ $product->product_sku }}"
                                    name="product_sku" placeholder="Enter Product SKU ">
                                @if ($errors->has('product_sku'))
                                    <span class="text-danger">{{ $errors->first('product_sku') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Product Buy Price </label>
                                <input type="number" class="form-control" id=""
                                    value="{{ $product->product_buy_price }}" name="product_buy_price"
                                    placeholder="Enter Product Buy Price">
                                @if ($errors->has('product_buy_price'))
                                    <span class="text-danger">{{ $errors->first('product_buy_price') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Product Sell Price</label>
                                <input type="number" class="form-control" id=""
                                    value="{{ $product->product_sell_price }}" name="product_sell_price"
                                    placeholder="Enter Product Sell Price ">
                                @if ($errors->has('product_sell_price'))
                                    <span class="text-danger">{{ $errors->first('product_sell_price') }}</span>
                                @endif
                            </div>
                        </div>



                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Product Stock</label>
                                <input type="number" class="form-control" value="{{ $product->product_stock }}"
                                    name="product_stock" placeholder="Enter Product Stock ">
                                @if ($errors->has('product_stock'))
                                    <span class="text-danger">{{ $errors->first('product_stock') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Product Status</label>
                                <select class="form-control" name="status" value="{{$product->status}}">
                                    {{-- <option selected="" disabled="">== Choose Size ==</option>
                                    <option value="{{ $product->id }}" <?php if ($product->status==1) {   echo 'selected';} ?>> Your Product : 
                                        @if ($product->status == 1)
                                            <span class='badge badge-success'>Active</span>
                                        @else
                                            <span class='badge badge-danger'>InActice</span>
                                        @endif
                                    </option> --}}
                                    <option value="1">Active</option>
                                    <option value="0">InActive</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Product Description</label>
                                <textarea type="text" class="form-control" value="" id="" name="product_description"
                                    placeholder="Enter Product Description ">{{ $product->product_description }}</textarea>
                                @if ($errors->has('product_description'))
                                    <span class="text-danger">{{ $errors->first('product_description') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Update Image</label>
                                            <input type="file" class="form-control" value="{{ old('product_img') }}"
                                                name="product_img">
                                            @if ($errors->has('product_img'))
                                                <span class="text-danger">{{ $errors->first('product_img') }}</span>
                                            @endif
                                        </div>
                                    </div> 
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Old Image</label>
                                            <img src="{{URL::to($product->product_img)}}"  style="height: 70px; width:100px; " alt="">  
                                            <input type="text" name="oldImage" value="{{ $product->product_img }}">
                                            @if ($errors->has('product_img'))
                                                <span class="text-danger">{{ $errors->first('product_img') }}</span>
                                            @endif
                                        </div>
                                    </div> 

                            </div>      
                        </div>

                    </div>
                    <div class="card-body">


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
