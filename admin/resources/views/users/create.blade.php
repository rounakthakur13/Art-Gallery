@extends('layouts.app')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-3">
            <h2>Create New User</h2>
        </div>
        <div class="pull-right mt-3">
            <a class="btn btn-success btn-sm" href="{{ route('users.index') }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Warning!</strong> Please check your input code<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container-fluid mt-3">   
     <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role:</strong>
                      <select class="form-control" id="exampleFormControlSelect1" name="account_type">
                        <option value="Artist">Artist</option>
                        <option value="Buyer">Buyer</option>
                      </select>
                </div>
            </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email</strong>
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mobile No.</strong>
                <input type="number" name="mobile" class="form-control" placeholder="Mobile">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address</strong>
                <textarea class="form-control" name="address" placeholder="Address"></textarea>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xs-12">
          <div class="form-group">
                <strong>Upload Image</strong>
                <input type="file" accept=".jpg,.gif,.png,.jpeg" name="file" class="form-control" id="exampleFormControlFile1">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password</strong>
                <input type="password" name="password" class="form-control"  placeholder="Password"/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square"></i> Submit</button>
        </div>
    </div>
</div>
   
</form>
@endsection