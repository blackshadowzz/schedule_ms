<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\time;
use App\Models\Subject;
use App\Models\Semester;
use Ramsey\Uuid\Type\Time as TypeTime;

class ScheduleController extends Controller
{
    
    public function index(Request $re){

        $sched=Schedule::with('Time')->with('Subject')->with('Semester')->get();
        if($re->query('search')){
            $sched=Schedule::where('schedule_name','LIKE','%'.$re->query('search').'%')
            ->with('Time')->with('Subject')->with('Semester')->get();
        }
        $time=Time::get(['id','times','days','start_date','end_date']);
        $sub=Subject::get(['id','subject_name']);
        $sem=Semester::get(['id','semester_name']);
        return view('schedules.index',compact('sched','time','sub','sem'));
    }

    public function store(Request $re){
        $sched=$re->except(['_token','_method','updated_by']);
        if(Schedule::create($sched)){
            return redirect('schedules')->with('message','Schedule one record has been created successfully!');
        }
        return back();
    }
}
