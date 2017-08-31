<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

/*
Route::resource('groups', 'GroupsController', [
    'middleware' =>  'developer',
]);
*/

Route::group(['middleware' => 'developer'], function()
{
    Route::resource('groups', 'GroupsController');
    Route::resource('projects', 'ProjectsController',['except' =>['create', 'edit', 'store', 'update', 'destroy']]);

});
/*
Route::resource('projects', 'ProjectsController', [
    'middleware' =>  'client',
]);
*/

Route::group(['middleware' => 'client'], function()
{
    Route::resource('projects', 'ProjectsController', ['except' => ['index']]);
});

Route::get('/home', 'HomeController@index')->name('home');
