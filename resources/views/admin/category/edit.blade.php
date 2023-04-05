@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h3>Edit new Category</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Category Name*</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Enter category name">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <a href="{{ route('category.index') }}" class="btn btn-round btn-lg btn-warning">Back</a>
                            <input type="reset" class="btn btn-round btn-lg btn-danger">
                            <input type="submit" class="float-right btn btn-round btn-lg btn-success" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
