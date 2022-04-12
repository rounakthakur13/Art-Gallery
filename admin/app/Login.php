<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
	public $timestamps = false;
    protected $table = 'login';
    protected $fillable = ['name','password','email','mobile','address','account_type','image']; 

}
