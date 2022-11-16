<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
        $time=Time::all();
        if($re->query('search')){
            $time=Time::where('times','LIKE','%'.$re->query('search').'%')->get();
        }
        return view('times.index',compact('time'));
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
        $time=new Time();
        $time->times=$request->times;
        // $time['days']=$request->input('days[]');
        $time->days=$request->days;
        $time->start_date=$request->start_date;
        $time->end_date=$request->end_date;
        $time->created_by=$request->created_by;
        if($time->save()){
            return redirect('times')->with('message', 'Time one record created successfully!');
        }
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function show(Time $time)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $time=Time::where('id',$id)->first();
        return view('times.update',compact('time'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Time $time)
    {
        $tim=$request->except(['_token','id','_method','created_by']);
        if(Time::where('id',$time->id)->update($tim)){
            return redirect('times')
            ->with('message_danger','Time one record has been updated successfully!');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function destroy(Time $time)
    {
        if(Time::where('id', '=', $time->id)->delete()){
            return redirect('times')->with('message_danger','Time one record was deleted successfully!');
        }
    }
}
