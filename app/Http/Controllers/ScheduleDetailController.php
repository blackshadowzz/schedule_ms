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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
        $sched=Schedule_detail::with('Room')->with('Subject')
        ->with('Classtable')->with('Teacher')->with('Semester')->get();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sched=$request->except(['_token','updated_by','_method']);
        if(Schedule_detail::create($sched)){
            return redirect('schedules')->with('message', 'Schedule one record was created successfully!');
        } 
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule_detail  $schedule_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule_detail $schedule_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule_detail  $schedule_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule_detail $schedule_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule_detail  $schedule_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule_detail $schedule_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule_detail  $schedule_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Schedule_detail::where('id',$id)->delete()){
            return redirect('schedules')->with('message', 'Schedule record deleted successfully');
        }
        return back();
    }
}
