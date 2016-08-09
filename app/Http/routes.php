<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/manage', 'AdminController@login');
Route::post('/manage', 'AdminController@postLogin');

Route::get('/dashboard', function (){
    return view('admin.dashboard');
});

Route::get('/contest-add', 'AdminController@addContest');
Route::post('/contest-add', 'AdminController@postAddContest');

Route::get('/contest-list', 'AdminController@showContestList');
Route::get('/contest-view/{contest}', 'AdminController@viewContest');

Route::get('/c/{contest}/problem-add', 'AdminController@addProblem');
Route::post('/c/{contest}/problem-add', 'AdminController@postAddProblem');

Route::get('/c/{contest}/p/{problem}/problem-edit', 'AdminController@editProblem');
Route::patch('/c/{contest}/p/{problem}/problem-edit', 'AdminController@updateProblem');

Route::delete('/c/{contest}/p/{problem}/problem-delete', 'AdminController@deleteProblem');