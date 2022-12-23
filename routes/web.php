<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ClasstableController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleDetailController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentClassController;
use App\Models\Classtable;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Student_class;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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
    Route::resource('semesters',SemesterController::class);
    Route::resource('classes',ClasstableController::class);
    Route::resource('schedules',ScheduleDetailController::class);
    Route::resource('student_classes',StudentClassController::class);



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

    Route::get('/home', function(Request $re){

        $class=Classtable::all()->count();
        $sub=Subject::all()->count();
        $stu_count=Student::all()->count();
        $teach_count=Teacher::all()->count();

        //Student class
        $assign=Student_class::with('Student')->with('Classtable')->orderBy('id', 'desc')->paginate(5);
        if($re->query('search')){
            $assign=Student_class::where('fisrt_name','LIKE','%'.$re->query('search').'%')
            ->orWhere('last_name','LIKE','%'.$re->query('search').'%')->
            orWhere('class_name','LIKE','%'.$re->query('search').'%')->with('Student')->with('Classtable')->paginate(5);
        }

        //Teacher part
        $teach=Teacher::with('Position')->orderBy('id', 'desc')->paginate(5);
        if($re->query('search')){
            $teach=Teacher::where('first_name','LIKE','%'.$re->query('search').'%')
            ->orWhere('last_name','LIKE','%'.$re->query('search').'%')
            ->orWhere('email','LIKE','%'.$re->query('search').'%')->with('Position')->paginate(5);
        }

        return view('/home',compact('stu_count','teach_count','class','sub','assign','teach'));
    });

});


