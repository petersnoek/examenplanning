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

//CRUD exams
Route::get('/kwalificatiedossiers', 'KwalificatiedossierController@index');
Route::get('/kwalificatiedossiers/create', 'KwalificatiedossierController@create');
Route::post('/kwalificatiedossiers', 'KwalificatiedossierController@store');
Route::get('kwalificatiedossiers/{kwalificatiedossier}/remove', 'KwalificatiedossierController@destroy');
Route::get('kwalificatiedossiers/{kwalificatiedossier}/edit', 'KwalificatiedossierController@edit');
Route::put('kwalificatiedossiers/{kwalificatiedossier}', 'KwalificatiedossierController@update');

//CRUD Students
Route::get('/students/create', 'StudentController@create');
Route::post('/students', 'StudentController@store');
Route::get('/students/{student}/edit', 'StudentController@edit');
Route::get('/students/{student}/remove', 'StudentController@destroy');
Route::put('/students/{student}', 'StudentController@update');

//CRUD bedrijven
Route::get('/companies', 'CompanyController@index');
Route::get('/companies/create', 'CompanyController@create');
Route::post('/companies', 'CompanyController@store');
Route::get('/companies/{company}/edit', 'CompanyController@edit');
Route::get('/companies/{company}/remove', 'CompanyController@destroy');
Route::put('/companies/{company}', 'CompanyController@update');

//Contact Users
Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create');
Route::post('/users', 'UserController@store');
Route::get('/users/{user}/edit', 'UserController@edit');
Route::get('/users/{user}/remove', 'UserController@destroy');
Route::put('/users/{user}', 'UserController@update');

//CRUD Appointments
Route::get('/appointments', 'AppointmentController@index');
Route::post('/appointments', 'AppointmentController@store');
Route::get('/appointments/{appointment}/remove', 'AppointmentController@destroy');

//CRUD Periods
Route::get('/periods', 'PeriodController@index');
Route::get('/periods/create', 'PeriodController@create');
Route::post('/periods', 'PeriodController@store');
Route::get('/periods/{period}/remove', 'PeriodController@destroy');
Route::get('/periods/{period}/edit', 'PeriodController@edit');
Route::put('/periods/{period}', 'PeriodController@update');

//CRUD slots
Route::get('/slots', 'SlotController@index');
Route::get('/slots/{period}', 'SlotController@show');
Route::get('/slots/{period}/create', 'SlotController@create');
Route::post('/slots/addtoperiod/{period}', 'SlotController@store');
Route::post('/slots/plan/{slot}', 'SlotController@plan');


Route::get('/slots/{slot}/remove', 'SlotController@destroy');

Route::get('/slots/assignable/show', 'SlotController@showAssignables');
Route::get('/slots/assignable/show/{period}', 'SlotController@showAssignable');
Route::get('/slots/assign', 'SlotController@assign');

//CRUD schoolyears
Route::get('/schoolyears/create', 'SchoolyearController@create');
Route::get('/schoolyears', 'SchoolyearController@index');
Route::get('/schoolyears/{schoolyear}/remove', 'SchoolyearController@destroy');
Route::get('/schoolyears/{schoolyear}/edit', 'SchoolyearController@edit');

Route::post('/schoolyears', 'SchoolyearController@store');
Route::put('/schoolyears/{schoolyear}', 'SchoolyearController@update');

//CRUD exams
Route::get('/exams/show', ['uses' => 'AgendaController@all', 'middleware' => ['checkauthorization']]);
Route::get('/exams/create', 'ExamController@create');
Route::post('/exams/create', 'ExamController@store');

//AJAX endpoints
Route::get('/getPvbs/{kwalificatiedossier}', 'ExamController@getPvbs');
Route::get('/kwalificatiedossier/all', 'KwalificatiedossierController@all');
Route::get('/companies/all', 'CompanyController@getAll');
Route::post('/exams/invitees', 'ExamController@getInvitees');


//CRUD agenda
Route::get('/agenda', ['uses' => 'AgendaController@index']);
Route::get('/agenda/{davinci_id}/show', ['uses' => 'AgendaController@index', 'middleware' => ['checkauthorization', 'checkrequesteduseragenda']]);
Route::get('/agenda/{davinci_id}/show/table', ['uses' => 'AgendaController@requestAgendaTable', 'middleware' => ['checkauthorization', 'checkrequesteduseragenda']]);
Route::get('/agenda/all', ['uses' => 'AgendaController@all', 'middleware' => ['checkauthorization']]);


Route::post('/requestagenda', 'AgendaController@requestAgenda');

//CRUD revisions
Route::get('/revisions', 'RevisionController@index');

//CRUD Deletes
Route::get('/deletes', 'DeletionController@index');
Route::get('/deletes/{modelname}', 'DeletionController@index');

//CRUD Projects
Route::get('/projects/create', 'ProjectController@create');
Route::get('/projects', 'ProjectController@index');
Route::get('/projects/{project}/remove', 'ProjectController@destroy');
Route::get('/projects/{project}/edit', 'ProjectController@edit');

Route::post('/projects', 'ProjectController@store');
Route::put('/projects/{project}', 'ProjectController@update');








