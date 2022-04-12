@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="container mt-3">
	<h3><span class="text-info">Database Name: </span>{{ App\Http\Controllers\DataController::databaseName() }}<button class="btn btn-success btn-sm pull-right">Create New Table</button></h3>
	</div>
<div class="row justify-content-center">
       
                 <div class="card">
                      <div class="card-header bg-dark text-light text-justify">
                            <strong>Tables</strong>
                      </div>
                  <div class="card-body">
                  	@foreach($tables as $table)
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                   <i class="fa fa-check-square"></i> {{ $table }}
                   <a href="{{route('showTable',$table)}}" class="btn-sm btn-warning">Show</a>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
                
            </div>
        </div>
</div>
@endsection