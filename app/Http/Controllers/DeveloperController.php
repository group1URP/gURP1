<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;

class DeveloperController extends Controller
{
    //
    public function devWithSkill($skillID)
    {
    	//$skillDevs = Skill::with('developer')->where(['id' => $skillID])->get();
    	$skillDevs = Skill::with('developers.user')->find($skillID);

    	return view('developers.skill')->with('skillDevs',$skillDevs);
    }
}
