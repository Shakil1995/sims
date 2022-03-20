@extends('layouts.mastar')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">  Store </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('stores.index') }}">Store List</a> </li>
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
            <h3 class="card-title">Update Category</h3>
          </div>
          <form  action="{{ route('stores.update',$store->id) }}"  method="post" >
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="card-body">
                    <div class="form-group">
                      <label for="">Store Name</label>
                      <input type="text" class="form-control" id="" name="name" placeholder="Enter Store  name">
                      @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
      
                      <div class="form-group">
                        <label for="">Store Icon</label>
                        <input type="file" class="form-control" id="" name="store_icon" >
                        @if ($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
      
                      <div class="form-group">
                          <label for="">Store Type</label>
                                      <select class="form-control" name="status" value="{{ old('status') }}" >
                                        <option selected="" disabled="">== Choose Status ==</option>
                                          <option value="1">Active</option>
                                          <option value="0">InActive</option>
                                      </select>
                          @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
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