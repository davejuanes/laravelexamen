<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\EstudentsController;
use App\Http\Controllers\MatriculasController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('estudents', EstudentsController::class);
Route::resource('courses', CoursesController::class);
Route::resource('matriculas', MatriculasController::class);