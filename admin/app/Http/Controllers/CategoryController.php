<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
    	if (Auth::check()) {

    	 $categories= Category::latest()->paginate(5);
    	  			

    	return view('categories.index',compact('categories'))
    			->with('i', (request()->input('page', 1) - 1) * 5);	
    	}
    	else
    		return view('auth.login');
    	
    }
    public function store(Request $request){
    	$request->validate([
            'category_name' => 'required|max:20|min:3',
        ]);
        Category::create($request->all());
        toastr()->success('Category created successfully');
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        toastr()->error('Category deleted successfully');
        return redirect()->route('categories.index');
    }
    public function edit(Category $category){
    	return view('categories.edit',compact('category'));
    }

     public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|min:3|max:20',
        ]);
        $category->update($request->all());
        toastr()->info('Category updated successfully');
         return redirect()->route('categories.index');
    }
}
