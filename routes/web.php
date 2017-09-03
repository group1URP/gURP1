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

//landingpage
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/browse', 'PagesController@browse');
Route::get('/feed', 'PagesController@feed');

Auth::routes();

Route::resource('groups', 'GroupsController', ['middleware' => 'role']);
Route::resource('projects', 'ProjectsController', ['middleware' => 'role' ]);

Route::post('/projects/proposal/{projectID}','ProjectsController@submitProposal');
Route::get('/projects/proposal/accept/{projectID}/{groupID}','ProjectsController@acceptProposal');



Route::get('/dashboard', 'DashboardController@index')->name('home');
