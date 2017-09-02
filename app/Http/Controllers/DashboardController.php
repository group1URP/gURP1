<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Group;

class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->is_client) {
             return view('client_dashboard')->with('projects',auth()->user()->projects);
        } else {
             return view('dev_dashboard')->with('groups',auth()->user()->groups);
        }
        

       
    }
}
