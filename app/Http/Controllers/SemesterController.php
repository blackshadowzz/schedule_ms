<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sem=Semester::all();
        return view('semesters.index',compact('sem'));
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
    public function store(Request $re)
    {
        $sem=$re->except(['_token','updated_by','_method']);
        if(Semester::create($sem)){
            return redirect('semesters')->with('message','Semester one record has been created successfully!');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(Semester $semester)
    {
        $sem=Semester::where('id',$semester->id)->first();
        return view('semesters.update',compact('sem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semester $semester)
    {
        $sem=$request->except(['_token','_method','created_by','id']);
        if(Semester::where('id',$semester->id)->update($sem)){
            return redirect('semesters')->with('message_danger','Semester one record has been updated successfully!');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semester $semester)
    {
        if(Semester::where('id',$semester->id)->delete()){
            return redirect('semesters')->with('message_danger','Semester has been deleted successfully!');
        }
    }
}
