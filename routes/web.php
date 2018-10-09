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

//CRUD Students
Route::get('/students/create', 'StudentController@create');
Route::post('/students', 'StudentController@store');
Route::get('/students/{student}/edit', 'StudentController@edit');
Route::get('/students/{student}/remove', 'StudentController@destroy');
Route::put('/students/{student}', 'StudentController@update');

//Contact Students
Route::get('/students/contact', 'StudentController@mail');

//CRUD Appointments
Route::get('/appointments', 'AppointmentController@index');
Route::post('/appointments', 'AppointmentController@store');
Route::get('/appointments/{appointment}/remove', 'AppointmentController@destroy');

//CRUD Periods
Route::get('/periods/create', 'PeriodController@create');
Route::post('/periods', 'PeriodController@store');
Route::get('/periods/{period}/remove', 'PeriodController@destroy');
Route::get('/periods/{period}/edit', 'PeriodController@edit');
Route::put('/periods/{period}', 'PeriodController@update');

//CRUD slots
Route::get('/slots', 'SchoolyearController@Index');
Route::post('/slots/addtoperiod/{period}', 'SlotController@store');
Route::get('/slots/{period}', 'SlotController@Create');
Route::get('/slots/{slot}/remove', 'SlotController@destroy');

Route::get('/slots/assignable/show', 'SlotController@showAssignables');
Route::get('/slots/assignable/show/{period}', 'SlotController@showAssignable');
Route::get('/slots/assign', 'SlotController@assign');


//CRUD schoolyears
Route::get('/schoolyears/create', 'SchoolyearController@create');
Route::post('/schoolyears', 'SchoolyearController@store');
Route::get('/schoolyears/{schoolyear}/remove', 'SchoolyearController@destroy');
Route::get('/schoolyears/{schoolyear}/edit', 'SchoolyearController@edit');
Route::put('/schoolyears/{schoolyear}', 'SchoolyearController@update');

//CRUD exams
Route::get('/exams/create', 'ExamController@create');
Route::post('/exams/create', 'ExamController@store');

//CRUD agenda
Route::get('/agenda', ['uses' => 'AgendaController@index']);
Route::get('/agenda/{davinci_id}/show', ['uses' => 'AgendaController@index', 'middleware' => 'checkRole']);
Route::get('/agenda/{davinci_id}/show/table', ['uses' => 'AgendaController@requestAgendaTable', 'middleware' => 'checkRole']);
Route::get('/agenda/all', 'AgendaController@all');

Route::post('/requestagenda', 'AgendaController@requestAgenda');









