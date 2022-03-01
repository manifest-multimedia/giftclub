<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
            $chart_options =[
                'chart_title' => 'Users by months', 
                'report_type' => 'group_by_date', 
                'model' => 'App\Models\User', 
                'group_by_field' => 'created_at', 
                'group_by_period' => 'month', 
                'chart_type' => 'pie',
            ];
            $registered=User::count();
            $active=User::has('userProducts')->count();
            $chart = new LaravelChart($chart_options); 
            return view('backend.admin', compact('chart', 'registered', 'active'));
        
    }
}
