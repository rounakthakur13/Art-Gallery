@extends('layouts.app')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-3">
                <h2>Feedbacks</h2>
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
            <th>Name</th>
            <th>Message</th>
            <th width="200px">Action</th>
        </tr>
        @foreach ($feedbacks as $feedback)
        <tr>
              <td>{{ $feedback->id }}</td>
            <td>{{ $feedback->name }}</td>
            <td>{{ $feedback->message }}</td>
            <td>
                <form action="{{ route('feedbacks.destroy',$feedback->id) }}" method="POST">
    
                
                    	<a class="btn btn-primary btn-sm" href="{{ route('feedbacks.show', $feedback->id) }}"><i class="fa fa-eye"></i> Show</a>
							  
				
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
						        <p>Are You Sure to Delete This Message</p>
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
     {!! $feedbacks->links() !!}
@endsection