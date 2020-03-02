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

// Main Dashboard
Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/load-atividades', 'AtividadeController@loadAtividades')->name('loadAtividades');

// Dashboard template
Route::get('/template', function () {
    $professores = App\Professor::take(3)->latest()->get();
    $users = App\User::take(3)->latest()->get();
    return view('dashboard-template', ['professores' => $professores, 'users' => $users]);
})->middleware('auth');

// Reports
Route::get('/relatorios', function () {
    return view('master');
})->middleware('auth')->name('relatorios');

// Auth
Auth::routes(['register' => false]);

// Logout Method
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Professor
Route::resource('professores', 'ProfessorController', ['parameters' => ['professores' => 'professor']])->middleware('auth');

// User
Route::resource('users', 'UserController')->middleware('auth');

// Turma
Route::resource('turmas', 'TurmaController')->middleware('auth');

// Local
Route::resource('locais', 'LocalController', ['parameters' => ['locais' => 'local']])->middleware('auth');

// Recurso
Route::resource('recursos', 'RecursoController')->middleware('auth');

// Atividade
Route::resource('atividades', 'AtividadeController')->middleware('auth');