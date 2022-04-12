@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-3">
                <h2> Show User</h2>
            </div>
            <div class="pull-right mt-3 ">
                <a class="btn btn-success btn-sm" href="{{ route('users.index') }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
        </div>
    </div>   
   <div class="container-fluid mt-3 ">    
    <div class="row justify-content-center">
       
                 <div class="card">
                      <div class="card-header bg-dark text-light">
                            <strong>Profile Dashboard</strong>
                      </div>
                  <div class="card-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            
                            <img src="{{ asset('public/images/'.$user->image) }}" width="160px" height="150px" class="img-responsive" />
                        </div>
                    </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Role:</strong>
                        {{ $user->account_type }}
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password:</strong>
                        {{ $user->password }}
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Mobile:</strong>
                        {{ $user->mobile }}
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Address:</strong>
                        {{ $user->address }}
                    </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        
    </div>
@endsection