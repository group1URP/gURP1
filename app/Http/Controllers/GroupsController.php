<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupRequest;
use App\Developer;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $groups = Group::all();

        return view('groups.index')->with('groups',$groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         //
        $this->validate($request,[
            'name' => 'required',
            'max_size' => 'required'
        ]);

        $group = new Group;
        $group->name = $request->input('name');
        $group->max_size = $request->input('max_size');

        if($request->input('description') != null)
        {
            $group->description = $request->input('description');
        }

        $group->user_id = auth()->user()->id;
        $group->save();

        $group->users()->attach(auth()->user()->id);

        return redirect('/dashboard')->with('success', 'Group \''.$group->name.'\' has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $group = Group::with(['proposals','proposals.project'])->find($id);
        //return $group;
        return view('groups.show')->with('group',$group);
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
        $group = Group::find($id);

        return view('groups.edit')->with('group',$group);
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
            'name' => 'required',
            'max_size' => 'required'
        ]);

        $group = Group::find($id);
        $group->name = $request->input('name');
        $group->max_size = $request->input('max_size');

        if($request->input('description') != null)
        {
            $group->description = $request->input('description');
        }

        $group->save();

        return redirect('/groups')->with('success', 'Group \''.$group->name.'\' has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group_name = $group->name;
        $group->delete();

        return redirect('/groups')->with('success', 'Group \''.$group_name.'\' has been deleted successfully');
    }

    public function requestToJoin(Request $request, $groupID)
    {    
        if (auth()->user()->is_client) {
            return redirect('/');
        } 

        $this->validate($request,[
            'reason' => 'required'
        ]);
        $id = auth()->user()->id;
        $dev = Developer::where(['user_id' => $id])->get();

        $gReq = new GroupRequest;
        $gReq->user_id = $id;
        $gReq->group_id = $groupID;
        $gReq->dev_id = $dev[0]->id;
        $gReq->reason = $request->input('reason');

        $gReq->save();

        return redirect('/groups/' . $groupID)->with('success', 'Your request has been sent successfully');
    }

    public function requestOutcome(Request $request,$groupID, $gReq, $outcome)
    {
        $group = Group::find($groupID);

        if ($group->user_id == auth()->user()->id) {
            $groupRequest = GroupRequest::find($gReq);

            $groupRequest->is_approved = $outcome;
            $groupRequest->update();

            return redirect('/groups/' . $groupID); 
        }else
        {
            return redirect('/groups');
        } 


    }
}
