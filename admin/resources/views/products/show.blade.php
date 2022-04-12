@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left mt-3">
			<h5>Product Details</h5>
		</div>
		<div class="pull-right mt-3">
			<a class="btn btn-success btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
		</div>
	</div>
</div>
<div class="container-fluid mt-3 ">
	<div class="jumbotron">
		<div class="row">
			<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" style="font-size: 22px;">
				<div class="col-xs-12 col-sm-12 col-md-12" >
					<div class="form-group">
						<strong>Title:</strong>
						{{ $product->prod_name }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Category:</strong>
						@foreach($categories as $category)
						@if($category->category_id == $product->category_id)
						{{ $category->category_name }}
						@endif
						@endforeach
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Description:</strong>
						{{ $product->prod_description }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>End Date:</strong>
						{{ $product->due_date }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Starting Bid:</strong>
						${{ $product->starting_bid }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Artist:</strong>
						{{ $product->artist }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Highest Bidder:</strong>
						@if(isset($highestBidder[0]))
						@foreach($users as $user)
						@if($user->id == $highestBidder[0]->bidder)
						{{ $user->name }}
						@endif
						@endforeach
						@endif
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Highest Bid:</strong>
						@if(isset($highestBidder[0]))
						
						{{ ($highestBidder[0]->bidamount) }}
						@endif
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Status:</strong>
						@if(isset($highestBidder[0]))
						
						@if($highestBidder[0]->status == 0)
						Active
						@else
						Expired
						@endif
						@endif
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Bid Log: </strong>
						<button type="button" class="btn btn-info btn-sm " data-toggle="modal" data-target="#bidlog">
						Click</button>
					</div>
				</div>
				
			</div>
			<div class="col-lg-8 col-md-12">
				<div class="col-xs-12 col-sm-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						
						<img src="{{ asset('public/images/'.$product->prod_image) }}"  class="img-fluid" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="bidlog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-size: 12px;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title center" id="exampleModalLabel">
					
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				 <center><h5>{{ $product->prod_name }} Bidding Log</h5></center>
                           <div class="container-fluid table-responsive">
                    <table id="demoTable" class="table table-lg ">
        <thead>
                <tr>
                        <th sort="index">Bidder</th>
                        <th sort="date">Date of Bid Placed</th>
                        <th sort="description">Amount</th>
                        
                </tr>
        </thead>

           <tbody>
         
          				@foreach ($bidlogs as $bidlog) 
          				 <tr>
                        <td>{{ $bidlog->name }}</td>
                        <td>{{ $bidlog->biddatetime }}</td>
                        <td>{{ $bidlog->bidamount }}</td>
                        </tr>

                        @endforeach
          
        </tbody>
      </table>
    </div>
			</div>
		</div>
	</div>
	
</div>

@endsection