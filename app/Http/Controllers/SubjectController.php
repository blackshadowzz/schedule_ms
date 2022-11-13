<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubRequest;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public  function index(Request $re){
        $sub=Subject::with('Course')->get();
        if($re->query('search')){
            $sub=Subject::where('subject_name','LIKE','%'.$re->query('search').'%')->with('Course')->get();
        }
        $course=Course::get(['id','course_name']);
        if($sub){
            return view('courses.subjects.index',compact('course','sub'));
        }
    }
    public function store(StoreSubRequest $re){
        $sub=new Subject();
        $sub->subject_name=$re->subject_name;
        $sub->course_id=$re->course_id;
        $sub->description=$re->description;
        $sub->credit=$re->credit;
        $sub->created_by=$re->created_by;
        if($sub->save()){
            return redirect('subjects')->with('message', 'Subject record added successfully');
        }
        return back();

    }
    public function edit( $id){
        if(!$id) return back(404);
        $sub=Subject::with('Course')->where('id',$id)->first();
        $course=Course::get(['id','course_name']);
        if($sub){
            return view('courses.subjects.update',compact('sub','course'));
        }
    }
    public function update(StoreSubRequest $re,$id){
        $sub=Subject::find($id);
        $sub->subject_name=$re->subject_name;
        $sub->course_id=$re->course_id;
        $sub->description=$re->description;
        $sub->credit=$re->credit;
        $sub->created_by=$re->created_by;
        $sub->updated_by=$re->updated_by;
        if($sub->save()){
            return redirect('subjects')->with('message', 'Subject record updated successfully');
        }
        return back();
    }
    public function show($id){
        $sub=Subject::with('Course')->find($id)->first();
        if($sub){
            return view('courses.subjects.view',compact('sub'));
        }
    }
    public function destroy($id){
        $sub=Subject::find($id);
        if($sub->delete()){
            return redirect('subjects')->with('message', 'Subject record deleted successfully');
        }
        return back();
    }
}
