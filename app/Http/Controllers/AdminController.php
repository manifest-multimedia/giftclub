<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Support\Facades\Gate;



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
            
            if (Gate::allows(['isAdmin'])) {
                // The user has Admin Privileges
                return view('backend.admin', compact('chart', 'registered', 'active'));
            }
            else {
                abort(404);
            }       
        
            
    }

    public function users(){
        
            if (Gate::allows(['isAdmin'])) {
            return view('backend.users');
            } else {
                abort(404);
            }
    
        }
}
