@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <a href="{{ route('slider.create') }}" class="btn btn-info my-3">Create</a>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Slider</h1>
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
                            <th>Title</th>
                            <th>Sub_Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $key=>$slider)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->sub_title }}</td>
                                <td><img src="{{ asset('uploads/slider/'.$slider->image) }}" alt="slider_image" style="width: 150px; height:80px"></td>
                                <td>
                                    <a href="{{ route('slider.edit',$slider->id)}}" class="btn btn-sm btn-danger">Edit</a>
                                   <form id="delete-form-{{ $slider->id }}" action="{{ route('slider.destroy', $slider->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button class="btn btn-danger" type="button" onclick="if(confirm('are you sure to delete this?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $slider->id }}').submit();
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
