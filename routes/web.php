<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\ScheduleController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function(){
    Route::resource('teachers',TeacherController::class);
    Route::resource('positions',PositionController::class);
    Route::resource('departments',DepartmentController::class);
    Route::resource('students',StudentController::class);
    Route::resource('courses',CourseController::class);
    Route::resource('rooms',RoomController::class);
    Route::resource('buildings',BuildingController::class);
    Route::resource('times',TimeController::class);
    Route::resource('semesters',SemesterController::class);
    Route::controller(ScheduleController::class)->group(function(){
        Route::prefix('schedules')->group(function(){
            Route::get('/','index');
            Route::post('/create','store')->name('schedule.store');
        });
    });


    Route::controller(SubjectController::class)->group(function(){
        Route::prefix('subjects')->group(function(){
            Route::get('/','index');
            Route::post('store','store')->name('store_subject');
            Route::get('{id}/edit','edit')->name('edit_subject');
            Route::put('update/{id}','update')->name('update_subject');
            Route::delete('delete/{id}','destroy')->name('delete_subject');
            Route::get('view/{id}','show')->name('view_subject');
        });
    });

});


