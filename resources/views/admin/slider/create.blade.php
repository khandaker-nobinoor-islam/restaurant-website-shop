@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h3>Add new slider</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-5 col-sm-6">
                            <div class="form-group">
                                <label>Slider Title*</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Slider name">
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-6">
                            <div class="form-group">
                                <label>Slider Sub Title*</label>
                                <input type="text" name="sub_title" class="form-control" placeholder="Enter Slider name">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Slider image*</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <a href="{{ route('slider.index') }}" class="btn btn-round btn-lg btn-warning">Back</a>
                            <input type="reset" class="btn btn-round btn-lg btn-danger">
                            <input type="submit" class="float-right btn btn-round btn-lg btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
