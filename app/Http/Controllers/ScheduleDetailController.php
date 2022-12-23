<?php

namespace App\Http\Controllers;

use App\Models\Classtable;
use App\Models\Room;
use App\Models\Schedule_detail;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ScheduleDetailController extends Controller
{

    public function index(Request $re)
    {
        $sched=Schedule_detail::with('Room')->with('Subject')
        ->with('Classtable')->with('Teacher')->with('Semester')->orderBy('id', 'desc')->get();
        if($re->query('search')){
            $sched=Schedule_detail::where('class_name','LIKE','%'.$re->query('search').'%')
            ->with('Room')->with('Subject')
            ->with('Classtable')->with('Teacher')->with('Semester')->get();
        }
        $room=Room::get(['id','room_name']);
        $sub=Subject::all();
        $class=Classtable::all();
        $teach=Teacher::all();
        $sem=Semester::all();
        return view('schedule_details.index',compact('class','teach','sub','sched','sem','room'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $sched=$request->except(['_token','updated_by','_method']);
        if(Schedule_detail::create($sched)){
            return redirect('schedules')->with('message', 'Schedule one record was created successfully!');
        } 
        return back();
    }

    public function show($id)
    {
        if($id==null) return abort(404);
        $sched=Schedule_detail::where('id',$id)->with('Room')->with('Subject')
        ->with('Classtable')->with('Teacher')->with('Semester')->first();
        return view("schedule_details.view",compact('sched'));


    }


    public function edit($id)
    {
        if($id==null) return abort(404);
        $sched=Schedule_detail::where('id',$id)->with('Room')->with('Subject')
        ->with('Classtable')->with('Teacher')->with('Semester')->first();
        $room=Room::get(['id','room_name']);
        $sub=Subject::all();
        $class=Classtable::all();
        $teach=Teacher::all();
        $sem=Semester::all();
        return view('schedule_details.update',compact('class','teach','sub','sched','sem','room'));
    }


    public function update(Request $request, $id)
    {
        $sched=$request->except(['_token','id','_method','created_by']);
        if(Schedule_detail::where('id',$id)->update($sched)){
            return redirect('schedules')->with('message_danger', 'Schedule record updated successfully!');
        }
        return back();
    }


    public function destroy($id)
    {
        if(Schedule_detail::where('id',$id)->delete()){
            return redirect('schedules')->with('message_danger', 'Schedule record deleted successfully');
        }
        return back();
    }
}
