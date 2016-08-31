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

// Admin Related Route
Route::get('/manage', 'AdminController@showAdminDashboard');
/*Route::post('/manage', 'AdminController@postLogin');*/

Route::get('/contest-add', 'AdminController@addContest');
Route::post('/contest-add', 'AdminController@postAddContest');

Route::get('/contest-list', 'AdminController@showContestList');
Route::get('/contest-view/{contest}', 'AdminController@viewContest');

Route::get('/c/{contest}/problem-add', 'AdminController@addProblem');
Route::post('/c/{contest}/problem-add', 'AdminController@postAddProblem');

Route::get('/c/{contest}/p/{problem}/problem-edit', 'AdminController@editProblem');
Route::put('/c/{contest}/p/{problem}/problem-edit', 'AdminController@updateProblem');
Route::get('/c/{contest}/p/{problem}/problem-delete', 'AdminController@deleteProblem');

// App Route
Route::get('/contests', 'AppController@showContestList');
Route::get('/contests/{contest}', 'AppController@viewContest');
Route::get('/c/{contest}/p/{problem}', 'AppController@viewProblem');

Route::post('/c/{contest}/submit/{problem}', 'AppController@submitProblem');

Route::get('/submissions', 'AppController@showSubmissions');