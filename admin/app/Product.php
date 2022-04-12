<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	
 protected $fillable = ['prod_name','category_id','prod_description','prod_image','regular_price','date_posted','starting_bid','due_date','artist','status'];
 protected  $primaryKey='product_id';
}
