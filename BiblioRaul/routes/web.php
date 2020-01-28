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
    return view('dashboard',);
})->middleware('auth');

Route::get('/template', function () {
    $professores = App\Professor::take(3)->latest()->get();
    $users = App\User::take(3)->latest()->get();
    return view('dashboard-template', ['professores' => $professores, 'users' => $users]);
})->middleware('auth');

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes( /*['register' => false]*/);

Route::get('/tables', function () {
    return view('tables-template');
})->middleware('auth');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/professor', function () {
    return view('professor.index', [
        'professor' => App\Professor::latest()->get(),
    ]);
});

Route::get('/professor', 'ProfessorController@index')->middleware('auth');
Route::get('/professor/create', 'ProfessorController@create')->middleware('auth');
route::post('/professor', 'ProfessorController@store')->middleware('auth');
Route::get('/professor/{professor}', 'ProfessorController@show')->middleware('auth');
Route::get('/professor/{professor}/edit', 'ProfessorController@edit')->middleware('auth');
Route::put('/professor/{professor}', 'ProfessorController@update')->middleware('auth');