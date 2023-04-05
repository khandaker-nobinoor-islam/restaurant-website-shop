@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <a href="{{ route('item.create') }}" class="btn btn-info my-3">Create</a>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Item</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S/L</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Details</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key=>$item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->details }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <a href="{{ route('item.edit',$item->id)}}" class="btn btn-sm btn-primary float-right">Edit</a>
                       <form id="delete-form-{{ $item->id }}" action="{{ route('item.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                    <button class="btn btn-danger float-right" type="button" onclick="if(confirm('are you sure to delete this?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $item->id }}').submit();
                    }else{
                        event.preventDefault();
                    }">Delete</button>
                    </td>
                </tr>
           @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
