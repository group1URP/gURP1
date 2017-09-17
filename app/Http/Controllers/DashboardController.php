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
             return view('client_dashboard')->with('projects',auth()->user()->projects)->with('user', auth()->user());
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
             return view('dev_dashboard')->with('groups',auth()->user()->groups)->with('proposals',$props)->with('user', $user);
        }
        

       
    }

    public function cancelProposal(/*Request $request,*/ $proposalID/*, $has_reason*/){

        $proposal = Proposal::find($proposalID);
        $project = Project::find($proposal->project_id);
        if (!$project){
            $proposal->delete();
            return redirect('/dashboard');
        }
        /*Commented until we decide how to send the email
         *
        if (has_reason){
        $reason = $request->input('reason');
        Mail::send('mails.cancel_proposal_reason_mail', ['title' =>$proposal->details, 'content' => $reason], function ($message)
        {

            $message->from('test@gmail.com', 'test');

            $message->to('test2@test.com');

        });
        $project->has_group = null;
        $proposal->delete();
        }else{
            $proposal->delete();

        }
        */
        $proposal->delete();
        return redirect('/dashboard')->with('success', 'Your proposal has been deleted successfully');;



    }




}
