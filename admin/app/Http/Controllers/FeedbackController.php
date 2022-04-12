<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
class FeedbackController extends Controller
{
public function index(){
		if (Auth::check()) {
				$feedbacks = Contact::latest()->paginate(5);
				return view('feedbacks.index',compact('feedbacks'))
							->with('i', (request()->input('page', 1) - 1) * 5);
			}
			
		else{
			return view('auth.login');
		}
}
 public function show(Contact $feedback)
    {
        return view('feedbacks.show',compact('feedback'));
    }
public function destroy(Contact $feedback)
    {
        $feedback->delete();
        toastr()->error('Message deleted successfully');
        return redirect()->route('feedbacks.index');
    }

public function send(Request $request){
    	$this->validate($request,[

    		'message'=>'required|min:2|max:50'
    	]);
    	$data =  array('message'=> $request->message
    	);
    	Mail::to($request->email)->send(new SendMail($data));
        toastr()->success('Message successfully sent');
    	return back();



    }
}