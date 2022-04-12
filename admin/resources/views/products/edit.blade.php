@extends('layouts/app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mt-3">
        <div class="pull-left mt-3">
            <h2>Edit Product Details</h2>
        </div>
        <div class="pull-right mt-3">
            <a class="btn btn-success btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
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

<form action="{{ route('products.update',$product->product_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title</strong>
                    <input type="text" name="prod_name" class="form-control form-control-sm" placeholder="Product Title" value="{{$product->prod_name}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category</strong>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="category_id">
                        @foreach($categories as $category)
                        <option value="{{ $category->category_id}}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description</strong>
                    <textarea class="form-control form-control-sm" name="prod_description" placeholder="Description">{{ $product->prod_description }}
                    </textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <strong>Product Image</strong>
                    <input type="file" accept=".jpg,.gif,.png,.jpeg" value="{{ $product->prod_image}}" name="file" class="form-control form-control-sm" id="exampleFormControlFile1">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Regular Price</strong>
                    <input type="number" name="regular_price" class="form-control form-control-sm" placeholder="Price" value="{{ $product->regular_price }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Starting bid</strong>
                    <input type="number" name="starting_bid" class="form-control form-control-sm" placeholder="Starting Bid" value="{{ $product->starting_bid }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>End Date</strong>
                    <input type="date" name="due_date"  min="{{ Date('Y-m-d') }}" class="form-control form-control-sm" placeholder="End Date" value="{{ $product->due_date }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Artist</strong>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="artist">
                        @foreach ($users as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                        @endforeach
                        
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square"></i> Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection