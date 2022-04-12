@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mt-3">
        <div class="pull-left mt-3">
            <h2>Edit Category</h2>
        </div>
        <div class="pull-right mt-3">
            <a class="btn btn-success btn-sm" href="{{ route('categories.index') }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Warning!</strong> Please check input field code<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('categories.update',$category->category_id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="container-fluid jumbotron mt-3">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category Name</strong>
                    <input type="text" name="category_name" class="form-control form-control-sm"  value="{{$category->category_name}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square"></i> Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection