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

Route::resource('groups', 'GroupsController', ['middleware' => 'role']);
Route::resource('projects', 'ProjectsController', ['middleware' => 'role' ]);

Route::post('/projects/proposal/{projectID}','ProjectsController@submitProposal');
Route::get('/projects/proposal/accept/{projectID}/{groupID}','ProjectsController@acceptProposal');



Route::get('/dashboard', 'DashboardController@index')->name('home');

//clients profile
Route::get('/client/{id}', 'UsersController@showClientProfile');
Route::get('/client/edit/{id}', 'UsersController@editClientProfile');
Route::put('/client/{id}', 'UsersController@updateClientProfile');

//developers profiles
Route::get('/developer/edit/{id}', 'UsersController@showDeveloperProfile');
Route::put('/developer/edit/{id}', 'UsersController@editDeveloperProfile');