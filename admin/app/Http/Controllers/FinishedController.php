<?php

namespace App\Http\Controllers;
use App\Bidreport;
use App\Login;
use App\Product;

use Illuminate\Http\Request;

class FinishedController extends Controller
{
    public function index(){

    	$finishedAuctions = Bidreport::where('status','=','1')->get();
    	$users = Login::get();
    	$products = Product::get();
    	return view('finished.index',compact('finishedAuctions','users','products'));
    }
}
