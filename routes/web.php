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



Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/livros', 'LivroController@index')->name('livros');    
    Route::post('/livros', 'LivroController@filter');    
    Route::get('/users', 'UserController@index')->name('users');    
    
    Route::get('/livros/add', 'LivroController@add')->name('livros.add');    
    Route::post('/livros/add', 'LivroController@save');
    
    Route::get('/users/add', 'UserController@add')->name('users.add');    
    Route::post('/users/add', 'UserController@save');

    Route::get('/livros/show/{id}', 'LivroController@show')->name('livros.show');    
    
    Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');    
    Route::post('/users/edit/{id}', 'UserController@update');    
    Route::get('/users/delete/{id}', 'UserController@delete')->name('users.delete');
    
    Route::get('/livros/edit/{id}', 'LivroController@edit')->name('livros.edit');    
    Route::post('/livros/edit/{id}', 'LivroController@update');    
    Route::get('/livros/delete/{id}', 'LivroController@delete')->name('livros.delete');    
    Route::get('/livros/retirar/{id}', 'LivroController@retirar')->name('livros.retirar');    
    Route::get('/livros/devolver/{id}', 'LivroController@devolver')->name('livros.devolver');    

});
Route::get('/', 'HomeController@index')->name('home');
