<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ThematicAreaController;
use App\Http\Controllers\BusinessUnitController;
use App\Http\Controllers\StaffTitleUnitController;
use App\Http\Controllers\LessonLearnedController;

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
//
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');
Route::resource('country', CountryController::class)->middleware('auth');
Route::resource('project', ProjectController::class)->middleware('auth');
Route::resource('thematic', ThematicAreaController::class)->middleware('auth');
Route::resource('business_unit', BusinessUnitController::class)->middleware('auth');
Route::resource('title', StaffTitleUnitController::class)->middleware('auth');
Route::resource('lesson', LessonLearnedController::class)->middleware('auth');
Route::get('lesson_export',[LessonLearnedController::class, 'export_lesson'])->name('lesson.export')->middleware('auth');
