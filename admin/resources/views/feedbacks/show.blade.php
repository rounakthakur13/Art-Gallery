@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left mt-3">
			<h5>Feedback</h5>
		</div>
		<div class="pull-right mt-3">
                <a class="btn btn-success btn-sm" href="{{ route('feedbacks.index') }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
 <div class="container-fluid mt-3 ">    
    <div class="row justify-content-center">
       
                 <div class="card">
                      <div class="card-header bg-dark text-light">
                            <strong>Feedback Details</strong>
                      </div>
                  <div class="card-body">
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>ID:</strong>
                            {{ $feedback->id }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $feedback->name }}
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>From:</strong>
                        {{ $feedback->email }}
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Subject:</strong>
                        {{ $feedback->subject }}
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Message:</strong>
                        {{ $feedback->message }}
                    </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                             <button type="button" class="btn btn-info btn-sm " data-toggle="modal" data-target="#sendMail">Reply
                                </button>
                </div>
              
                
            </div>
        </div>
        
    </div>
      <div class="modal fade" id="sendMail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-size: 12px;">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                     <div class="row">
                                          <div class="col-lg-12 margin-tb">
                                                <div class="pull-left">
                                                    <h5>Reply To Feedback</h5>
                                                </div>
                                            </div>
                                    </div></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                                                        <script type="text/javascript">
                                        $('#sendMail').on('hidden.bs.modal', function(e){
                                            $(this).find('form').trigger('reset');
                                        })
                                    </script>

                                  </div>
                                  <div class="modal-body">

                        <form action="{{ url('feedbacks/send') }}" method="post" >
                            @csrf
                            <div class="container-fluid">   
                             <div class="row justify-content-center">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Message</strong>
                                        <textarea class="form-control form-control-sm" name="message" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" name="email" class="form-control form-control-sm" value="{{ $feedback->email }}">
                                    </div>
                                </div>

                                  
                            </div>
                            </div>
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm "> Submit</button>
                                  </div>
                           
                                </form>
                                   
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
@endsection
<!-- Modal -->
                          