<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
        $course=Course::all();
        if($re->query('search')){
            $course=Course::where('course_name','LIKE','%'.$re->query('search').'%')
                ->all();
        }
        return view('courses.index',compact('course'));
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
        $course=$re->except(['_token']);
        if(Course::create($course)){
            return redirect('courses')->with('message', 'Course record added successfully');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $course=Course::where('id', $course->id)->first();
        return view('courses.view',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        if(!$course) return back(404);
        $course=Course::where('id',$course->id)->first();
        return view('courses.update',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course=Course::find($id);
        if(!$course) return back(404);
        $course->course_name=$request->course_name;
        $course->description=$request->description;
        $course->created_by=$request->created_by;
        $course->updated_by=$request->updated_by;
        if($course->save()){
            return redirect('courses')->with('message', 'Course record updated successfully');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Course::where('id', $id)->delete()){
            return redirect('courses')->with('message', 'Course record deleted successfully');
        }
        return back();
    }
}
