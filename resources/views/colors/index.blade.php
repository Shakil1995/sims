@extends('layouts.mastar')

@section('content')


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">  Color List </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Color List</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
 <a href="{{ route('colors.create') }}"  class="btn btn-success mb-3">Add Category</a>

 <example-component> </example-component>


<table id="datatable" class="display table-sm table-bordered " style="width:100%">
    <thead>
        <tr class="text-center">
            <th>SL NO</th>
            <th>Color Name</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>

        @if ($colors)
        @foreach ($colors as $key=>$color)
        <tr class="text-center">
            <td><b>{{ ++$key }}</b></td>
            <td>{{ $color->color_name }}</td>
            <td >
                <a href="{{ route('colors.edit',$color->id) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i></a>
                <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="color-delete-{{ $color->id }}"> <i class="fa fa-trash"></i></a>
            
                <form id="color-delete-{{ $color->id }}" action="{{ route('colors.destroy',$color->id) }}" method="post">
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