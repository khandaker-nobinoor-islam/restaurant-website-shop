@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h3>Add new Item</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('item.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Item name*</label>
                                <input type="text" name="name" value="{{ $item->name }}" class="form-control" placeholder="item name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Select Category*</label>
                                <select class="form-control" name="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Price*</label>
                                <input type="text" name="price" value="{{ $item->price }}" class="form-control" placeholder="Enter price">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label>Item Details*</label>
                            <textarea name="details" rows="5" class="form-control" placeholder="Item details">{{ $item->details }}</textarea>
                        </div>
                        <div class="col-lg-12 p-2">
                            <a href="{{ route('item.index') }}" class="btn btn-round btn-lg btn-warning">Back</a>
                            <input type="reset" class="btn btn-round btn-lg btn-danger">
                            <input type="submit" class="float-right btn btn-round btn-lg btn-success" value="UPDATE">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
