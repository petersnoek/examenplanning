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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/students/create', 'StudentController@create');
Route::post('/students', 'StudentController@store');

Route::get('/students/{student}/edit', 'StudentController@edit');
Route::get('/students/{student}/remove', 'StudentController@destroy');
Route::put('/students/{student}', 'StudentController@update');

Route::get('/students/contact', 'StudentController@mail');

Route::get('/appointments', 'AppointmentController@index');




