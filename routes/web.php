<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'LessonController@index');
Route::get('lessons/{id}', 'LessonController@show');
