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
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
	
});

Auth::routes();

Route::get('/', 'TodoController@index');

// TodoList route
Route::post ('/addItem', 'TodoController@addItem');
Route::post('/editItem', 'TodoController@editItem');
Route::post('/deleteItem/{id}', 'TodoController@deleteItem' );


// Note route
Route::get('/note', 'NoteController@index');
Route::post('/addNote', 'NoteController@addNote');
Route::post('/updateNote', 'NoteController@updateNote');
Route::post('/deleteNote/{id}', 'NoteController@deleteNote');

