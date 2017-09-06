<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Group;
use App\Proposal;

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
            $user =  auth()->user()->load(['groupOwner', 'groupOwner.proposals']);
            $props = array();

            foreach ($user->groupOwner as $group) {                
                foreach ($group->proposals as $p) {
                    array_push($props,$p);
                }
            }

            // return gettype($props[0]);
            // return $props;
             return view('dev_dashboard')->with('groups',auth()->user()->groups)->with('proposals',$props);
        }
        

       
    }

    public function cancelProposal($proposalID){

        $proposal = Proposal::find($proposalID);
        $proposal->delete();
        return redirect('/dashboard');

    }




}
