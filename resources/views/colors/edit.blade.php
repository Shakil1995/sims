
@extends('layouts.mastar')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">  Color </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('colors.index') }}">Category List</a> </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Update Color</h3>
          </div>
          <form  action="{{ route('colors.update',$color->id) }}"  method="post" >
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" value="{{$color->color_name }}" name="color_name" placeholder="Enter Color name">
                @if ($errors->has('color_name'))
                  <span class="text-danger">{{ $errors->first('color_name') }}</span>
                @endif
              </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
    
@endsection