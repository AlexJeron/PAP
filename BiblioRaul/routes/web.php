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
    $professores = App\Professor::take(3)->latest()->get();
    $users = App\User::take(3)->latest()->get();
    return view('dashboard', ['professores' => $professores, 'users' => $users]);
})->middleware('auth');

Route::get('/login', function () {
    return view('login');
});

Route::get('/tables', function () {
    return view('tables-template');
})->middleware('auth');

Auth::routes( /*['register' => false]*/);

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');