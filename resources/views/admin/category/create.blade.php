@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h3>Add new Category</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Category Name*</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Slider name">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <a href="{{ route('category.index') }}" class="btn btn-round btn-lg btn-warning">Back</a>
                            <input type="reset" class="btn btn-round btn-lg btn-danger">
                            <input type="submit" class="float-right btn btn-round btn-lg btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
