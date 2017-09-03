<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;



class ProjectsController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if guest only show public projects
        if (auth()->guest() || auth()->user()->is_client) {
            $projects = Project::where(['is_private' => 0, 'has_group' => 0])->get();
        }
        else // show all projects, public and private, to developers
        {
            $projects = Project::where('has_group', 0)->get();
        }

        return view('projects.index')->with('projects',$projects);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required'
        ]);

        $project = new Project;
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->user_id = auth()->user()->id;

        $checkbox_value = $request['private'];
        if ($checkbox_value === null ) {
            $project->is_private = false;
        } else {
            $project->is_private = $request->input('private');
        }
        $project->save();
        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allProposals = null;
        $availableGroups = null;


        if (auth()->guest()) {
            $project = Project::where('is_private', 0)->get();
            
            if(!$project){
                return  redirect('/projects');
            }

            return view('projects.show')->with('project',$project[0]);

        } else {

            // get the group id of the available proposals for the project
            $project = Project::with(array('proposals'=>function($query){
                $query->select('project_id','group_id');
            }))->where('id',$id)->get();


            // find all the proposal made on project with the data of the group that made it
            $allProposals = Project::with('proposals.group')->where('id',$id)->get();
           
            // Make a list of the groups owned by the user which hasn't made a proposal this project
            $proposalGroups = array(); // groups that have already made a proposal
            $groups = auth()->user()->groupOwner; // get the groups the developer is the owner of

            // create an array of the proposal group ids to help filter groups later
            foreach ($project[0]->proposals as $proposal) {
                array_push($proposalGroups,$proposal->group_id);
            }

            $availableGroups = array(); // groups able to make a proposal for project
            
            // remove groups that have already made a proposal on a project
            foreach ($groups as $group) {
                if (!in_array($group->id, $proposalGroups)) {
                    array_push($availableGroups,$group);
                }
            }

            if(!$project){
              return  redirect('/projects');
            }

            return view('projects.show')->with('project',$project[0])->with('groups', $availableGroups)->with('proposals',$allProposals[0]->proposals);

            }        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $project = Project::find($id);
        if(auth()->user()->id !== $project->user_id){
            return redirect('/dashboard');

        }
        return view('projects.edit')->with('project',$project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required'            
        ]);

        $project = Project::find($id);
        $project->title = $request->input('title');

        if (strlen($request->input('extra_details')) > 0)        
        {
            $project->extra_details = $request->input('extra_details');   
        }

        $checkbox_value = $request['private'];
        if ($checkbox_value === null ) {
            $project->is_private = false;
        } else {
            $project->is_private = $request->input('private');
        }
        $project->save();



        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        $project->delete();

        return redirect('/projects');
    }

    /*
     * Add a proposal to a project.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function submitProposal(Request $request, $id)
    {
        $this->validate($request,[
            'details' => 'required',
            'group' => 'required'
        ]);

        $proposal = new Proposal;
        $proposal->details = $request->input('details');
        $proposal->group_id = $request->input('group');
        $proposal->project_id = $id;
        $proposal->save();

        return redirect('/projects');
    }

    public function acceptProposal($projectID, $group)
    {
        $project = Project::find($projectID);

        // check that the logged in user owns the project
        if ($project->user_id == auth()->user()->id && !$project->has_group) {
            $project->has_group = true;
            $project->group_id = $group;
            $project->save();
            return redirect('/projects/'.$projectID);

        } else {
            return redirect('/projects');
        }
        
    }
}
