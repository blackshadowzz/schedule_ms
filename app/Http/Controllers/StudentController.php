<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Laravel\Ui\Presets\React;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
        $stu=Student::paginate(8);
        if($re->query('search')){
            $stu=Student::where('first_name','LIKE','%'.$re->query('search').'%')
            ->orWhere('last_name','LIKE','%'.$re->query('search').'%')
            ->orWhere('email','LIKE','%'.$re->query('search').'%')->paginate(8);
        }
        return view('students.index',compact('stu'));
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
    public function store(StudentRequest $re)
    {
        $stu=new Student();
        $stu->first_name=$re->first_name;
        $stu->last_name=$re->last_name;
        $stu->dob=$re->dob;
        $stu->gender=$re->gender;
        $stu->phone=$re->phone;
        $stu->email=$re->email;
        $stu->address=$re->address;
        $stu->created_by=$re->created_by;
        if($stu->save()){
            return redirect('students')->with('message', 'Student one record added successfully');
        }
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$id) return back(404);
        $stu=Student::where('id',$id)->first();
        return view('students.view',compact('stu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$id) return back(404);
        $stu=Student::where('id',$id)->first();
        return view('students.update',compact('stu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $re, $id)
    {
        $stu=Student::find($id);
        $stu->first_name=$re->first_name;
        $stu->last_name=$re->last_name;
        $stu->dob=$re->dob;
        $stu->gender=$re->gender;
        $stu->phone=$re->phone;
        $stu->email=$re->email;
        $stu->address=$re->address;
        $stu->updated_by=$re->updated_by;
        $stu->created_by=$re->created_by;
        if($stu->save()){
            return redirect('students')->with('message', 'Student one record updated successfully');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Student::where('id',$id)->delete()){
            return redirect('students')->with('message', 'Student record deleted successfully');
        }
    }
}
