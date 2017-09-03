<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to laravel!';
        return view('pages.index')->with('title', $title);
    }

    public function feed(){
       // $title = 'this is feeds page';
        return view('pages.feed');
    }

    public function about(){
       // $title = 'about page';
        return view('pages.about');
    }

    public function browse(){
       // $title = 'browse';
        return view('pages.browse');
    }
}
