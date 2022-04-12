@extends('layouts/app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-3">
                <h2>Users</h2>
            </div>
            <div class="pull-right mt-3">
                <a class="btn btn-success btn-sm" href="{{ route('users.create') }}"><i class="fa fa-plus-square"></i> Create new User</a>
            </div>
        </div>
    </div>
   <div class="container-fluid table-responsive">
    <table class="table table-bordered mt-3">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Role</th>
            <th width="270px">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->account_type }}</td>
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
   
                    <a class="btn btn-primary btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fa fa-eye"></i> Show</a>
    
                    <a class="btn btn-warning btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-edit"></i> Edit</a>
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
						        <p>Are You Sure to Delete This User?????</p>
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
    {!! $users->links() !!}
      
@endsection