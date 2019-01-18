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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');;

//CRUD exams
Route::get('/kwalificatiedossiers', 'KwalificatiedossierController@index')->middleware('auth');;
Route::get('/kwalificatiedossiers/create', 'KwalificatiedossierController@create')->middleware('auth');;
Route::post('/kwalificatiedossiers', 'KwalificatiedossierController@store')->middleware('auth');;
Route::get('kwalificatiedossiers/{kwalificatiedossier}/remove', 'KwalificatiedossierController@destroy')->middleware('auth');;
Route::get('kwalificatiedossiers/{kwalificatiedossier}/edit', 'KwalificatiedossierController@edit')->middleware('auth');;
Route::put('kwalificatiedossiers/{kwalificatiedossier}', 'KwalificatiedossierController@update')->middleware('auth');;

//CRUD Students
Route::get('/students/create', 'StudentController@create')->middleware('auth');;
Route::post('/students', 'StudentController@store')->middleware('auth');;
Route::get('/students/{student}/edit', 'StudentController@edit')->middleware('auth');;
Route::get('/students/{student}/remove', 'StudentController@destroy')->middleware('auth');;
Route::put('/students/{student}', 'StudentController@update')->middleware('auth');;

//CRUD bedrijven
Route::get('/companies', 'CompanyController@index')->middleware('auth');;
Route::get('/companies/create', 'CompanyController@create')->middleware('auth');;
Route::post('/companies', 'CompanyController@store')->middleware('auth');;
Route::get('/companies/{company}/edit', 'CompanyController@edit')->middleware('auth');;
Route::get('/companies/{company}/remove', 'CompanyController@destroy')->middleware('auth');;
Route::put('/companies/{company}', 'CompanyController@update')->middleware('auth');;

//Contact Users
Route::get('/users', 'UserController@index')->middleware('auth');;
Route::get('/users/create', 'UserController@create')->middleware('auth');;
Route::post('/users', 'UserController@store')->middleware('auth');;
Route::get('/users/{user}/edit', 'UserController@edit')->middleware('auth');;
Route::get('/users/{user}/remove', 'UserController@destroy')->middleware('auth');;
Route::put('/users/{user}', 'UserController@update')->middleware('auth');;

//CRUD Appointments
Route::get('/appointments', 'AppointmentController@index')->middleware('auth');;
Route::post('/appointments', 'AppointmentController@store')->middleware('auth');;
Route::get('/appointments/{appointment}/remove', 'AppointmentController@destroy')->middleware('auth');;

//CRUD Periods
Route::get('/periods', 'PeriodController@index')->middleware('auth');;
Route::get('/periods/create', 'PeriodController@create')->middleware('auth');;
Route::post('/periods', 'PeriodController@store')->middleware('auth');;
Route::get('/periods/{period}/remove', 'PeriodController@destroy')->middleware('auth');;
Route::get('/periods/{period}/edit', 'PeriodController@edit')->middleware('auth');;
Route::put('/periods/{period}', 'PeriodController@update')->middleware('auth');;

//CRUD slots
Route::get('/slots', 'SlotController@index')->middleware('auth');;
Route::get('/slots/{period}', 'SlotController@show')->middleware('auth');;
Route::get('/slots/{period}/create', 'SlotController@create')->middleware('auth');;
Route::post('/slots/addtoperiod/{period}', 'SlotController@store')->middleware('auth');;
Route::post('/slots/plan/{slot}', 'SlotController@plan')->middleware('auth');;


Route::get('/slots/{slot}/remove', 'SlotController@destroy')->middleware('auth');;

Route::get('/slots/assignable/show', 'SlotController@showAssignables')->middleware('auth');;
Route::get('/slots/assignable/show/{period}', 'SlotController@showAssignable')->middleware('auth');;
Route::get('/slots/assign', 'SlotController@assign')->middleware('auth');;

//CRUD schoolyears
Route::get('/schoolyears/create', 'SchoolyearController@create')->middleware('auth');;
Route::get('/schoolyears', 'SchoolyearController@index')->middleware('auth');;
Route::get('/schoolyears/{schoolyear}/remove', 'SchoolyearController@destroy')->middleware('auth');;
Route::get('/schoolyears/{schoolyear}/edit', 'SchoolyearController@edit')->middleware('auth');;

Route::post('/schoolyears', 'SchoolyearController@store')->middleware('auth');;
Route::put('/schoolyears/{schoolyear}', 'SchoolyearController@update')->middleware('auth');;

//CRUD exams
Route::get('/exams/show', ['uses' => 'AgendaController@all', 'middleware' => ['checkauthorization']])->middleware('auth');;
Route::get('/exams/create', 'ExamController@create')->middleware('auth');;
Route::post('/exams/create', 'ExamController@store')->middleware('auth');;

//AJAX endpoints
Route::get('/getPvbs/{kwalificatiedossier}', 'ExamController@getPvbs');
Route::get('/kwalificatiedossier/all', 'KwalificatiedossierController@all');
Route::get('/companies/all', 'CompanyController@getAll');
Route::get('/projects/all', 'ProjectController@getAll');
Route::get('/employees/{company}', 'CompanyController@getEmployees');

Route::post('/exams/invitees', 'ExamController@getInvitees');


//CRUD agenda
Route::get('/agenda', ['uses' => 'AgendaController@index'])->name('personalAgenda')->middleware('auth');;
Route::get('/agenda/{davinci_id}/show', ['uses' => 'AgendaController@index', 'middleware' => ['checkauthorization', 'checkrequesteduseragenda']])->middleware('auth');;
Route::get('/agenda/{davinci_id}/show/table', ['uses' => 'AgendaController@requestAgendaTable', 'middleware' => ['checkauthorization', 'checkrequesteduseragenda']])->middleware('auth');;
Route::get('/agenda/all', ['uses' => 'AgendaController@all', 'middleware' => ['checkauthorization']])->middleware('auth');;


Route::post('/requestagenda', 'AgendaController@requestAgenda')->middleware('auth');;

//CRUD revisions
Route::get('/revisions', 'RevisionController@index')->middleware('auth');;

//CRUD Deletes
Route::get('/deletes', 'DeletionController@index')->middleware('auth');;
Route::get('/deletes/{modelname}', 'DeletionController@index')->middleware('auth');;

//CRUD Projects
Route::get('/projects/create', 'ProjectController@create')->middleware('auth');;
Route::get('/projects', 'ProjectController@index')->middleware('auth');;
Route::get('/projects/{project}/remove', 'ProjectController@destroy')->middleware('auth');;
Route::get('/projects/{project}/edit', 'ProjectController@edit')->middleware('auth');;

Route::post('/projects', 'ProjectController@store')->middleware('auth');;
Route::put('/projects/{project}', 'ProjectController@update')->middleware('auth');;


//test routes
Route::get('/test', 'ExamController@getInvitees');





