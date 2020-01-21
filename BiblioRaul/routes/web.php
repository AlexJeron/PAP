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
    return view('dashboard-template', ['professores' => $professores, 'users' => $users]);
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/tables', function () {
    return view('tables');
});

Auth::routes( /*['register' => false]*/);

Route::get('/home', 'HomeController@index')->name('home');
