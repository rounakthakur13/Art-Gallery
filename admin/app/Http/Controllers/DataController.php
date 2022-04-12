<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
use Illuminate\Support\Facades\DB;
class DataController extends Controller
{
   public function index(){
    $tables = DB::select('SHOW TABLES');
    $tables = array_map('current',$tables);
    return view('database.index',['tables'=>$tables]);
}
public static function databaseName(){
	$databaseName = DB::connection()->getDatabaseName();
	echo$databaseName;
}
public function show(Request $table){
	$detail = DB::select('Select * from'.$table);
	return view('database.index',compact('detail'));
}
}

