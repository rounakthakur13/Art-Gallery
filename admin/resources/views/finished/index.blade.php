@extends('layouts.app')
@section('content')
<div class="container-fluid row mt-3">	
	@foreach( $finishedAuctions as $finishedAuction)
	<div class="container justify-center border col-md-5 col-sm-12 col-xs-12 p-0 m-1"><p class="text-center text-dark border-bottom p-2"><span class="text-danger">Winner</span>
	@foreach( $users as $user)
	@if($user->id == $finishedAuction->bidder)
	{{ $user->name }}
	@endif
	@endforeach
	</p> 
		<div class="container text-center mb-3" >

		@foreach($products as $product)
		@if($product->product_id == $finishedAuction->productid)
		<img src="{{ asset('public/images/'.$product->prod_image) }}" class="img-fluid"/> 
		@endif
		@endforeach


		</div>
		<div class="container text-center border-top">
			<p class="text-info p-0 m-0"><span class="text-danger">Sold:</span>
				{{ $finishedAuction->bidamount }}
			</p>
			<p class="text-info p-0 m-0"><span class="text-danger">Artist:</span>
				@foreach($products as $product)
				@if($product->product_id==$finishedAuction->productid)
				{{ $product->artist }}
				@endif
				@endforeach
			</p>	
		</div>



	 </div>
	@endforeach
</div>
@endsection