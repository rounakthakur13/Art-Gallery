@extends('layouts.app')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-3">
                <h2>Categories</h2>
            </div>
            <div class="pull-right mt-3">
               <button type="button" class="btn btn-success btn-sm " data-toggle="modal" data-target="#addCategory">
							 <i class="fa fa-plus-square"></i> Add New Category
				</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-size: 12px;">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">
							         <div class="row">
										  <div class="col-lg-12 margin-tb">
										        <div class="pull-left">
										            <h5>Add New Category</h5>
										        </div>
										    </div>
									</div></h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
																        <script type="text/javascript">
										$('#addCategory').on('hidden.bs.modal', function(e){
											$(this).find('form').trigger('reset');
										})
									</script>

							      </div>
							      <div class="modal-body">

						<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
						    @csrf
						    <div class="container-fluid">   
						     <div class="row justify-content-center">
						        <div class="col-xs-12 col-sm-12 col-md-12">
						            <div class="form-group">
						                <strong>Name</strong>
						                <input type="text" name="category_name" class="form-control form-control-sm" placeholder="Category Name">
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
            <th>Category Name</th>
            <th width="200px">Action</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->category_id }}</td>
            <td>{{ $category->category_name }}</td>
            <td>
                <form action="{{ route('categories.destroy',$category->category_id) }}" method="POST">
    
                
                    	<a class="btn btn-primary btn-sm" href="{{route('categories.edit',$category->category_id) }}"><i class="fa fa-edit"></i> Edit</a>
							  
				
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
						 <i class="fa fa-trash"></i> Delete 
						</button>

						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <p>Are You Sure to Delete This Cateogory???</p>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-window-close"></i> Close</button>
								        @csrf
		                    		@method('DELETE')
		      
		                   				 <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
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
     {!! $categories->links() !!}

@endsection