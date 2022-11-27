<?php

namespace App\Http\Controllers;

use App\Models\Student_class;
use App\Models\Student;
use App\Models\Classtable;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
        $assign=Student_class::with('Student')->with('Classtable')->get();
        if($re->query('search')){
            $assign=Student_class::where('fisrt_name','LIKE','%'.$re->query('search').'%')
            ->orWhere('last_name','LIKE','%'.$re->query('search').'%')->
            orWhere('class_name','LIKE','%'.$re->query('search').'%')->get();
        }
        $stu=Student::all();
        $class=Classtable::all();
        return view('assign_students.index',compact('assign','stu','class'));
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
        $stu_class=$request->except(['_token']);
        if(Student_class::create($stu_class)){
            return redirect('student_classes')->with('message','One record was created successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student_class  $student_class
     * @return \Illuminate\Http\Response
     */
    public function show(Student_class $student_class)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student_class  $student_class
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stu_class=Student_class::where('id',$id)->with('Student')->with('Classtable')->first();
        $stu=Student::all();
        $class=Classtable::all();
        return view('assign_students.update',compact('stu_class','stu','class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student_class  $student_class
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stu_class=$request->except(['_token','_method','id']);
        if(Student_class::where('id',$id)->delete()){
            return redirect('student_classes')->with('message_danger','One student has been updated successfully!');
        }
        return back()->with('message','Cannot delete student and class becouse data has relation with another table.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student_class  $student_class
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Student_class::where('student_id',$id)->delete()){
            return redirect('student_classes')->with('message_danger','One student has been permanently deleted.');
        }
        return back()->with('message','Cannot delete student and class becouse data has relation with another table.');
    }
}
