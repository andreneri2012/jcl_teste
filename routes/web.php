<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'DashboardController@index');

Route::get('/criar-aluno', 'AlunoController@create');
Route::post('/post-aluno-form', 'AlunoController@store')->name('aluno.store');
Route::get('/todos-alunos', 'AlunoController@index');
Route::get('/editar-aluno/{id}', 'AlunoController@edit')->name('aluno.edit');
Route::post('/update-aluno-form/{id}', 'AlunoController@update');
Route::get('/remover-aluno/{id}', 'AlunoController@destroy');

Route::get('/criar-curso', 'CursoController@create');
Route::post('/post-curso-form', 'CursoController@store');
Route::get('/todos-cursos', 'CursoController@index');
Route::get('/editar-curso/{id}', 'CursoController@edit');
Route::post('/update-curso-form/{id}', 'CursoController@update');
Route::get('/remover-curso/{id}', 'CursoController@destroy');

