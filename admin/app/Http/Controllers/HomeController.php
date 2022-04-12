<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
use App\Contact;
use App\Bidreport;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $finished = Bidreport::where('status','=','1')->count();
        $users_count = Login::latest()->count();
        $feedback_count = Contact::latest()->count();

           $chart_options = [
             'chart_title' => 'Users By Months',
              'report_type' => 'group_by_date',
                 'model' => 'App\Login',
                     'group_by_field' => 'created_at',
                     'group_by_period' => 'month',
                    'chart_type' => 'line',
                     'color'=>'#7386D5',
            ];
         $chart1 = new LaravelChart($chart_options);
                  $chart_options = [
                'chart_title' => 'Products By Name',
                'report_type' => 'group_by_string',
                'model' => 'App\Product',
                'group_by_field' => 'prod_name',
                'chart_type' => 'pie',
                'filter_period' => 'month', // show products only registered this month
                  ];

        $chart2 = new LaravelChart($chart_options);
            return view('home',compact('chart1','chart2','finished','users_count','feedback_count'));
        }

}
