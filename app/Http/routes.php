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

Route::get('/contests', 'ContestController@contestList');

Route::get('/contests/{id}', 'ContestController@showContest');

Route::get('/admin-contests', 'AdminController@contestList');

Route::get('/admin-contests/{id}', 'AdminController@showContest');

Route::post('/admin-contests/{contest}', 'AdminController@addProblem');

Route::get('/problems/{problem}/edit', 'AdminController@editProblem');

/*Route::get('/problems/{problem-id}/edit', [
    'as' => 'problem-edit',
    'uses' => 'AdminController@editProblem'
]);*/

Route::patch('/problems/{problem}', 'AdminController@updateProblem');