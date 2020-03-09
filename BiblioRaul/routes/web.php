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

use App\Atividade;
use App\User;
use App\Local;
use App\Professor;
use App\Turma;
use App\Recurso;

Route::get('/', function () {
    $atividades = Atividade::latest()->get();
    $users = User::all()->sortBy('nome', SORT_LOCALE_STRING);
    $locais = Local::all()->sortBy('nome', SORT_LOCALE_STRING);
    $professores = Professor::all()->sortBy('nome', SORT_LOCALE_STRING);
    $turmas = Turma::all()->sortBy('id');
    $recursos = Recurso::all()->sortBy('nome', SORT_LOCALE_STRING);

    return view('dashboard.index', compact('atividades', 'users', 'locais', 'professores', 'turmas', 'recursos'));
})->middleware('auth');

// Dashboard template
Route::get('/template', function () {
    $professores = App\Professor::take(3)->latest()->get();
    $users = App\User::take(3)->latest()->get();
    return view('dashboard.dashboard-template', ['professores' => $professores, 'users' => $users]);
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
Route::get('/load-atividades', 'AtividadeController@ajaxLoad')->name('loadAtividades');
Route::put('/update-atividade', 'AtividadeController@ajaxUpdate')->name('updateAtividade');
Route::post('/store-atividade', 'AtividadeController@store')->name('storeAtividade');