<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
use Illuminate\Validation\ValidationExcepion;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if (Auth::check()) {
        $users = Login::latest()->paginate(5);
  
        return view('users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        } 
        else
            return view('auth.login');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|min:3',
            'password' => 'required|min:6|max:50',
            'email' => 'required|email|max:255|unique:App\Login,email',
            'mobile' => 'required|min:10|max:12',
            'address' => 'required|min:5|max:40',
            'account_type' => 'required',
            'file' => 'required',
        ]);
         $imagename = time().'.'.$request->file->extension();
         $request->file->move(public_path('images'),$imagename);
         $request['image']=$imagename;
        Login::create($request->all());
        toastr()->success('User created successfully.');
        return redirect()->route('users.index');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Login $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Login $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Login $user)
    {
        $request->validate([
            'name' => 'required|min:3|max:20',
            'password' => 'required|min:6|max:50',
            'email' => 'required|email|max:255|',
            'mobile' => 'required|min:10|max:12',
            'address' => 'required|min:5',
            'account_type' => 'required',
            'file' => 'required',
        ]);

         $imagename = time().'.'.$request->file->extension();
         $request->file->move(public_path('images'),$imagename);
         $request['image']=$imagename;

        $user->update($request->all());
        toastr()->info('User updated successfully');
         return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Login $user)
    {
        $user->delete();
        toastr()->error('User deleted successfully');
        return redirect()->route('users.index');
    }
}
