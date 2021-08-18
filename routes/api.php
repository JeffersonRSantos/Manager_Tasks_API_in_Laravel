<?php

use Illuminate\Http\Request;

//route API
Route::resource('/tasks', 'TasksController', ['only' => ['index', 'store', 'edit', 'update', 'destroy']]);
Route::get('/completed-tasks', 'TaskStatusController@index')->name('status-task');
Route::get('/completed/{id}', 'TaskStatusController@completed')->name('task-completed');
Route::get('/restore/{id}', 'TaskStatusController@restore')->name('restore-task');
Route::post('/filter-tasks', 'FilterTasksController@index')->name('filter-tasks');