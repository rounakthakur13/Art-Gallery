<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Login;
use App\Bidreport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Datetime;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if (Auth::check()) {
        $products = Product::latest()->paginate(5);
        $categories = Category::get();
        $users = Login::where('account_type','=','Artist')->get();
  
        return view('products.index',compact('products','categories','users'))
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
        return view('products.index');
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
            'prod_name' => 'required|max:10|min:3',
            'category_id' => 'required',
            'prod_description' => 'required|min:5',
            'regular_price' => 'required|min:1',
            'starting_bid' => 'required|gte:regular_price',
            'due_date' => 'required',
            'artist' => 'required',
            'file' => 'required',
        ]);
         $imagename = time().'.'.$request->file->extension();
         $request->file->move(public_path('images'),$imagename);
         $request['prod_image']=$imagename;
         $now = date("Y-m-d H:i:s");
         $status=0;
         if ($request->due_date==Date("Y-m-d")) {
             $request['due_date']=strftime("%Y-%m-%d", strtotime("$request->due_date +1 day"));
         }
         $request['date_posted']=$now;
         $request['status']=$status;
        Product::create($request->all());
        toastr()->success('Product added successfully.');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
         $categories = Category::get();
         $users = Login::get();
         $highestBidder= Bidreport::where('productid',$product->product_id)->orderBy('bidid','DESC')->get();
         $bidlogs = DB::table('bidreport')
                        ->leftJoin('login','bidreport.bidder','=','login.id')
                        ->leftJoin('products','bidreport.productid','=','products.product_id')->where('productid',"=",$product->product_id)
                            ->get();
        return view('products.show',compact('product','categories','highestBidder','users','bidlogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        $users = Login::where('account_type','=','Artist')->get();
        return view('products.edit',compact('product','categories','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'prod_name' => 'required|max:10|min:3',
            'category_id' => 'required',
            'prod_description' => 'required|min:5',
            'regular_price' => 'required|min:1',
            'starting_bid' => 'required|gte:regular_price',
            'due_date' => 'required',
            'artist' => 'required',
            'file' => 'required',
        ]);

        $imagename = time().'.'.$request->file->extension();
         $request->file->move(public_path('images'),$imagename);
         $request['prod_image']=$imagename;
         $now = date("Y-m-d H:i:s");
         $status=0;
         if ($request->due_date==Date("Y-m-d")) {
             $request['due_date']=strftime("%Y-%m-%d", strtotime("$request->due_date +1 day"));
         }
         $request['date_posted']=$now;
         $request['status']=$status;
         $product->update($request->all());
          toastr()->info('Product updated successfully');
         return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        
        $product->delete();
       toastr()->error('Product deleted successfully');
        return redirect()->route('products.index');
    }
}
