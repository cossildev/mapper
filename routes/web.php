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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {

  Route::get('task/create/form', 'TaskController@create')->name('task_create');
  Route::get('task/{id}/edit', 'TaskController@edit')->name('task_edit');
  Route::post('task/store', 'TaskController@store')->name('task_store');
  Route::post('task/{id}/update', 'TaskController@update')->name('task_update');
  Route::get('task/calendar', 'TaskController@calendar')->name('task_calendar');
  Route::get('task/to-json', 'TaskController@getTasks')->name('tasks_json');
  Route::get('task/{id}/start', 'TaskController@startTask')->name('task_initiate');

  Route::get('department/create/form', 'DepartmentsController@create')->name('department_create');
  Route::get('department/{id}/edit', 'DepartmentsController@edit')->name('department_edit');
  Route::post('department/create/store', 'DepartmentsController@store')->name('department_store');
  Route::post('department/{id}/update', 'DepartmentsController@update')->name('department_update');

  Route::get('process/create/form', 'ProcessesController@create')->name('process_create');
  Route::post('process/create/store', 'ProcessesController@store')->name('processes_store');
  Route::get('process/{id}/edit', 'ProcessesController@edit')->name('process_edit');
  Route::post('process/{id}/update', 'ProcessesController@update')->name('process_update');
  Route::get('process/{id}/tojson', 'ProcessesController@toJson')->name('process_to_json');
  Route::post('process/copy', 'ProcessesController@copy')->name('process_copy');
  Route::get('process/{id}/copy/clients', 'ProcessesController@copyClients')->name('process_copy_clients');

  Route::get('clients', 'ClientController@index')->name('clients');
  Route::get('client/create/form', 'ClientController@create')->name('client_create');
  Route::post('client/create/store', 'ClientController@store')->name('client_store');
  Route::get('client/{id}/edit', 'ClientController@edit')->name('client_edit');
  Route::post('client/{id}/update', 'ClientController@update')->name('client_update');

  Route::get('subprocesses', 'SubProcessesController@index')->name('subprocesses');
  Route::get('subprocess/{id}', 'SubProcessesController@show')->name('subprocess');
  Route::get('subprocesses/form/create', 'SubProcessesController@create')->name('sub_process_create');
  Route::post('subprocesses/create/store', 'SubProcessesController@store')->name('sub_process_store');
  Route::get('subprocesses/{id}/edit', 'SubProcessesController@edit')->name('sub_process_edit');
  Route::post('subprocesses/{id}/update', 'SubProcessesController@update')->name('sub_process_update');

  Route::get('user/{id}/avatar', 'UsersController@editAvatar')->name('user_avatar');
  Route::get('users/create/form', 'UsersController@create')->name('user_create');
  Route::get('user/{id}/avatar/{avatar}/upload', 'UsersController@uploadAvatar')->name('user_upload_avatar');
  Route::post('users/create/store', 'UsersController@store')->name('user_store');
  Route::post('user/{id}/update', 'UsersController@update')->name('user_update');
  Route::post('user/{id}/update/configs', 'UsersController@updateConfigs')->name('user_update_configurations');
  Route::post('user/{id}/update/password', 'UsersController@updatePassword')->name('user_update_password');

  Route::get('boards', 'BoardController@index')->name('boards');

  Route::get('mappings', 'MapperController@index')->name('mappings');
  Route::get('mapping/{id}/edit', 'MapperController@edit')->name('mapping_edit');
  Route::get('mapping/{id}', 'MapperController@show')->name('mapping');
  Route::get('mapping/create/form', 'MapperController@create')->name('mapping_create');
  Route::get('mapping/{id}/tasks', 'MapperController@taskToDo')->name('mapping_tasks_to_do');
  Route::post('mapping/store', 'MapperController@store')->name('mapping_store');
  Route::get('mapping/{id}/add-task', 'MapperController@addTask')->name('mapping_tasks');
  Route::post('mapping/{id}/add-task-store', 'MapperController@addTaskStore')->name('mapping_tasks_store');
  Route::get('mapping/{id}/task/{task}/remove', 'MapperController@removeTaskStore')->name('mapper_remove_task');
  Route::post('mapping/{id}/start', 'MapperController@start')->name('mapping_start');

  Route::get('tasks', 'TaskController@index')->name('tasks');
  Route::get('board', 'TaskController@showBoard')->name('board');
  Route::get('task/{id}', 'TaskController@show')->name('task');
  Route::post('task/{id}/pause', 'TaskController@pause')->name('task_pause');
  Route::post('task/{id}/start', 'TaskController@unPause')->name('task_start');
  Route::post('task/message/store', 'TaskMessagesController@store')->name('task_message_store');
  Route::post('task/{id}/delay', 'TaskController@delay')->name('task_delay');

  Route::get('departments', 'DepartmentsController@index')->name('departments');
  Route::get('department/{id}', 'DepartmentsController@show')->name('department');

  Route::get('processes', 'ProcessesController@index')->name('processes');
  Route::get('process/{id}', 'ProcessesController@show')->name('process');

  Route::get('users', 'UsersController@index')->name('users');
  Route::get('user/{id}', 'UsersController@show')->name('user');

});
