<?php

namespace App\Http\Controllers;

use App\Models\Student_class;
use App\Models\Student;
use App\Models\Classtable;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{


    public function index(Request $re)
    {
        $assign=Student_class::with('Student')->with('Classtable')->orderBy('id', 'desc')->paginate(8);
        if($re->query('search')){
            $assign=Student_class::where('fisrt_name','LIKE','%'.$re->query('search').'%')
            ->orWhere('last_name','LIKE','%'.$re->query('search').'%')->
            orWhere('class_name','LIKE','%'.$re->query('search').'%')->with('Student')->with('Classtable')->paginate(8);
        }
        $stu=Student::all();
        $class=Classtable::all();
        return view('assign_students.index',compact('assign','stu','class'));
    }


    public function create()
    {
        
    }


    public function store(Request $request)
    {
        $stu_class=$request->except(['_token']);
        if(Student_class::create($stu_class)){
            return redirect('student_classes')->with('message','One record was created successfully!');
        }
    }


    public function show($id)
    {
        $stu_class=Student_class::where('id',$id)->with('Student')->with('Classtable')->first();
        return view('assign_students.view',compact('stu_class'));
    }

    public function edit($id)
    {
        $stu_class=Student_class::where('id',$id)->with('Student')->with('Classtable')->first();
        $stu=Student::all();
        $class=Classtable::all();
        return view('assign_students.update',compact('stu_class','stu','class'));
    }


    public function update(Request $request, $id)
    {
        $stu_class=$request->except(['_token','_method','id']);
        if(Student_class::where('id',$id)->update($stu_class)){
            return redirect('student_classes')->with('message_danger','One student has been updated successfully!');
        }
        return back()->with('message','Cannot delete student and class becouse data has relation with another table.');
    }

    public function destroy($id)
    {
        if(Student_class::where('id',$id)->delete()){
            return redirect('student_classes')->with('message_danger','One student has been permanently deleted.');
        }
        return back()->with('message','Cannot delete student and class becouse data has relation with another table.');
    }
}
