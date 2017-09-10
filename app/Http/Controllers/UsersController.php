<?php

namespace App\Http\Controllers;


use App\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //client methods------------------------------------------------------------
    public function showClientProfile($id){

        $user = User::find($id);
        return view('profiles.client_profile')->with('user', $user);

    }

    public function editClientProfile($id){
        $user = User::find($id);
        return view('profiles.client_profile_edit')->with('user', $user);
    }

    public function updateClientProfile(Request $request, $id){

        $user = User::find($id);
        $client = User::find($id)->client;
        $client->business_name = $request->input('business_name');
        $client->business_type = $request->input('business_type');


        $client->update();
        return redirect("/dashboard")->with('success', 'Client profile \''.$user->username.'\' has been updated successfully');
    }



    //developer methods---------------------------------------------------------
    public function showDeveloperProfile($id){

        $user = User::find($id);
        return view('profiles.dev_profile')->with('user', $user);

    }

    public function editDeveloperProfile($id){
        $user = User::find($id);
        return view('profiles.dev_profile_edit')->with('user', $user);
    }

    public function updateDeveloperProfile(Request $request, $id){
        $user = User::find($id);
        $developer = User::find($id)->developer;
        //todo: other infos here..
        $developer.update();
        return redirect("/dashboard")->with('success', 'Developer profile \''.$user->username.'\' has been updated successfully');
    }






    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
