@extends('layouts.app')

@section('content')

<div class="row">
			<div class="container col">
				<div class="card bg-info text-light mt-3">
  				<div class="card-body">
  					<h4>Finished Auctions</h4>

   					<h1 class="ml-2">{{ $finished }} <i class="fa fa-hourglass-end fa-2x pull-right" style="opacity: 50%;"></i></h1>

  				</div>
  				<div class="card-footer text-center"><a href="{{ route('finished') }}"> More Info <i class="fa fa-arrow-circle-right fa-lg"></i></a></div>
				</div>
			</div>
			<div class="container col">
				<div class="card bg-warning text-light mt-3">
  				<div class="card-body">
  					<h4>Users</h4>
   					<h1 class="ml-2">{{ $users_count }}<i class="fa fa-users fa-2x pull-right" style="opacity: 50%;"></i> </h1>
  				</div>
  				<div class="card-footer text-center"><a href="{{ route('users.index') }}"> More Info <i class="fa fa-arrow-circle-right fa-lg"></i></a></div>
			</div>
		</div>
			<div class="container col">
				<div class="card bg-danger text-light mt-3">
  				<div class="card-body">
  					<h4>Feedbacks</h4>
   					<h1 class="ml-2">{{ $feedback_count }}<i class="fa fa-comments fa-2x pull-right" style="opacity: 50%;"></i> </h1>
  				</div>
  				<div class="card-footer text-center"><a href="{{ route('feedbacks.index') }}"> More Info <i class="fa fa-arrow-circle-right fa-lg"></i></a></div>
				</div>
			</div>
</div>
                    <div class="container mt-3">
	  				  <div class="row">
	       				 <div class="col">
	          				  <div class="card">
	               				<div class="card-body">

	                  		  <h1>{{ $chart1->options['chart_title'] }}</h1>
	                  		  {!! $chart1->renderHtml() !!}

	                			</div>

	            		    </div>
	        			</div>
	    				</div>
					</div>
					<div class="container mt-3">
	  				  <div class="row">
	       				 <div class="col-md-8">
	          				  <div class="card">
	               				<div class="card-body">

	                  		  <h1>{{ $chart2->options['chart_title'] }}</h1>
	                  		  {!! $chart2->renderHtml() !!}

	                			</div>

	            		    </div>
	        			</div>
	    				</div>
					</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    		{!! $chart1->renderChartJsLibrary() !!}
			{!! $chart1->renderJs() !!}
			{!! $chart2->renderChartJsLibrary() !!}
			{!! $chart2->renderJs() !!}
@endsection


