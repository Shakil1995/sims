@extends('layouts.mastar')

@section('content')


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">  Product List </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Product List</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
 <a href="{{ route('products.create') }}"  class="btn btn-success mb-3">Add Product</a>

 <example-component> </example-component>


<table id="datatable" class="display table-sm table-bordered " style="width:100%">
    <thead>
        <tr class="text-center">
            <th style="width: 5%">SL NO</th>
            <th style="width: 10%">Image</th>
            <th>Name</th>
            <th>SKU</th>
            <th style="width: 10%">Price</th>
            <th style="width: 10%">Stock</th>
            <th style="width: 10%">Status</th>
            <th style="width: 10%">Action</th>
            
        </tr>
    </thead>
    <tbody>

        @if ($products)
        @foreach ($products as $key=>$product)
        <tr class="text-center">
            <td><b>{{ ++$key }}</b></td>
            <td>  <img src="{{URL::to($product->product_img)}}"  style="height: 70px; width:100px; " alt=""></td>
            <td>{{ $product->product_name  }}</td>
            <td>{{ $product->product_sku }}</td>
            <td>{{ $product->product_sell_price }}</td>
            <td>{{ $product->product_stock }}</td>
            <td>
              @if($product->status==1)
                          <span class="badge badge-success">Active</span>
                          @else
                          <span class="badge badge-danger">No</span>
                        @endif  
            </td>
            <td >
              <a href="{{ route('products.edit',$product->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-eye"></i></a>
                <a href="{{ route('products.edit',$product->id) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i></a>
                <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="product-delete-{{ $product->id }}"> <i class="fa fa-trash"></i></a>
            
                <form id="product-delete-{{ $product->id }}" action="{{ route('products.destroy',$product->id) }}" method="post">
                @csrf
            @method('DELETE')
            </form>
            </td>
        </tr>
        @endforeach
            
        @endif
       
       
       
        
    </tbody>
  
</table>


@endsection