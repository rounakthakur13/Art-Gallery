@extends('layouts.app')
@section('content')
 <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-3">
                <h2>Products</h2>
            </div>
            <div class="pull-right mt-3">
                <button type="button" class="btn btn-success btn-sm " data-toggle="modal" data-target="#addProduct">
							<i class="fa fa-plus-square"></i> Add New Product
				</button>
			</div>
</div>
</div>

							<!-- Modal -->
							<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-size: 12px;">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">
							         <div class="row">
										  <div class="col-lg-12 margin-tb">
										        <div class="pull-left">
										            <h5>Add New Product</h5>
										        </div>
										    </div>
									</div></h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
																        <script type="text/javascript">
										$('#addProduct').on('hidden.bs.modal', function(e){
											$(this).find('form').trigger('reset');
										})
									</script>

							      </div>
							      <div class="modal-body">

						<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
						    @csrf
						    <div class="container-fluid">   
						     <div class="row justify-content-center">
						        <div class="col-xs-12 col-sm-12 col-md-12">
						            <div class="form-group">
						                <strong>Title</strong>
						                <input type="text" name="prod_name" class="form-control form-control-sm" placeholder="Product Title">
						            </div>
						        </div>
						        <div class="col-xs-12 col-sm-12 col-md-12">
						                <div class="form-group">
						                    <strong>Category</strong>
						                      <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="category_id">@foreach($categories as $category)
						                        <option value="{{ $category->category_id}}">{{ $category->category_name }}</option>
						                       @endforeach
						                      </select>
						                </div>
						            </div>
						            <div class="col-xs-12 col-sm-12 col-md-12">
						            <div class="form-group">
						                <strong>Description</strong>
						                <textarea class="form-control form-control-sm" name="prod_description" placeholder="Description"></textarea>
						            </div>
						        </div>
						        <div class="col-sm-12 col-md-12 col-xs-12">
						          <div class="form-group">
						                <strong>Product Image</strong>
						                <input type="file" accept=".jpg,.gif,.png,.jpeg" name="file" class="form-control form-control-sm" id="exampleFormControlFile1">
						            </div>
						        </div>
						          <div class="col-xs-12 col-sm-12 col-md-12">
						            <div class="form-group">
						                <strong>Regular Price</strong>
						                <input type="number" name="regular_price" class="form-control form-control-sm" placeholder="Price">
						            </div>
						        </div>
						        <div class="col-xs-12 col-sm-12 col-md-12">
						            <div class="form-group">
						                <strong>Starting bid</strong>
						                <input type="number" name="starting_bid" class="form-control form-control-sm" placeholder="Starting Bid">
						            </div>
						        </div>
						         <div class="col-xs-12 col-sm-12 col-md-12">
						            <div class="form-group">
						                <strong>End Date</strong>
						                <input type="date" name="due_date"  min="{{ Date('Y-m-d') }}" class="form-control form-control-sm" placeholder="End Date">
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
						    </div>
							</div>
							<div class="modal-footer">
							        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-window-close"></i> Close</button>
							        <button type="submit" class="btn btn-primary btn-sm "><i class="fa fa-check-square"></i> Submit</button>
							      </div>
						   
								</form>
							       
							      </div>
							      
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
	<div class="container-fluid table-responsive">
    <table class="table table-bordered mt-3">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Category</th>
            <th>Artist</th>
            <th width="270px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->product_id }}</td>
            <td>{{ $product->prod_name }}</td>
             @foreach($categories as $category)
             @if($category->category_id == $product->category_id)
            <td> {{ $category->category_name }}</td>
             @endif
            @endforeach
            
            <td>{{ $product->artist }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->product_id) }}" method="POST">

						<a class="btn btn-primary btn-sm" href="{{ route('products.show',$product->product_id) }}"><i class="fa fa-eye"></i> Show</a>		    
                   		 <a class="btn btn-warning btn-sm" href="{{ route('products.edit',$product->product_id) }}"><i class="fa fa-edit"></i> Edit</a>
                   		 <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
						   <i class="fa fa-trash"></i> Delete
							</button>

						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Confimation</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <p>Are You Sure to Delete This Product</p>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-window-close"></i> Close</button>
								        @csrf
		                    		@method('DELETE')
		      
		                   				 <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Delete</button>
						      </div>
						    </div>
						  </div>
						</div>
                </form>
            </td>
        </tr>
          @endforeach
    </table>
    </div>
    {!! $products->links() !!}
      
@endsection
					