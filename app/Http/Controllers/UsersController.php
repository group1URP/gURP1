<?php

namespace App\Http\Controllers;


use App\User;
use App\Skill;
use Illuminate\Support\Facades\Storage;
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

        $this->validate($request,[
            'profile_picture' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('profile_picture')){
            $filenameWithExt = $request->file('profile_picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile_picture')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            $path = $request->file('profile_picture')->storeAs('public/profile_pictures', $fileNameToStore);
        }

        $user = User::find($id);
        $client = User::find($id)->client;
        $client->business_name = $request->input('business_name');
        $client->business_type = $request->input('business_type');
        if ($request->hasFile('profile_picture')) {

            if ($client->profile_picture != 'no_image.png'){
                
               Storage::delete('public/profile_pictures/'.$client->profile_picture);
            }
            $client->profile_picture = $fileNameToStore;
        }

        $client->update();
        return redirect("/client/".$id)->with('success', 'Client profile has been updated successfully');
    }



    //developer methods---------------------------------------------------------
    public function showDeveloperProfile($id){

        $user = User::find($id);
        return view('profiles.dev_profile')->with('user', $user);

    }

    public function editDeveloperProfile($id){
        $user = User::find($id);
        $skills = Skill::pluck('skill','id');       
        return view('profiles.dev_profile_edit')->with('user', $user)->with('skills',$skills);
    }

    public function updateDeveloperProfile(Request $request, $id){
        
        $this->validate($request,[
            'profile_picture' => 'image|nullable|max:1999'
        ]);

         if ($request->hasFile('profile_picture')){
            $filenameWithExt = $request->file('profile_picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile_picture')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            $path = $request->file('profile_picture')->storeAs('public/profile_pictures', $fileNameToStore);
        }


        $user = User::find($id);
        $developer = User::find($id)->developer;
        //todo: other infos here..

        $skills = $developer->skills->pluck('id');

        $d = Skill::where(['id' => $developer->id])->pluck('id');        

        if ($request->hasFile('profile_picture')) {

            if ($developer->profile_picture != 'no_image.png'){
                Storage::delete('public/profile_pictures/'.$developer->profile_picture);
            }

            $developer->profile_picture = $fileNameToStore;
        }

        if (count($request->input("skills")) > 0) {
            $currentSkills = $developer->skills->pluck('id')->toArray();
            $newSkills = $request->input("skills");

            $addSkills=array_diff($newSkills,$currentSkills);
            $removeSkills=array_diff($currentSkills,$newSkills);

            $developer->skills()->detach($removeSkills); 
            $developer->skills()->attach($addSkills);
        }        

        $developer->about =  strlen($request->input("about")) >0 ? $request->input("about") : '';
        
                    
        $developer->update();
        return redirect("/developer/".$id)->with('success', 'Developer profile has been updated successfully');
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
