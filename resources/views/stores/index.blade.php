@extends('layouts.mastar')

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Store List </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Store List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <a href="{{ route('stores.create') }}" class="btn btn-success mb-3">Add Store</a>

    <example-component> </example-component>


    <table id="datatable" class="display table-sm table-bordered " style="width:100%">
        <thead>
            <tr class="text-center">
                <th>SL NO</th>
                <th>Store Icon</th>
                <th>Store Name</th>
                <th>Store Status</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>

            @if ($stores)
                @foreach ($stores as $key => $store)
                    <tr class="text-center">
                        <td><b>{{ ++$key }}</b></td>
                        <td> <img src="{{ URL::to($store->store_icon) }}" style="height: 50px; width:100px; " alt=""></td>
                        <td>{{ $store->store_name }}</td>
                        <td>
                            @if ($store->store_type)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger"> No Active</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-sm btn-info"> <i
                                    class="fa fa-edit"></i></a>
                            <a href="javascript:;" class="btn btn-sm btn-danger sa-delete"
                                data-form-id="store-delete-{{ $store->id }}"> <i class="fa fa-trash"></i></a>

                            <form id="store-delete-{{ $store->id }}" action="{{ route('stores.destroy', $store->id) }}"
                                method="post">
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
