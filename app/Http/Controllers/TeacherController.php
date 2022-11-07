<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeachRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Position;
use Faker\Provider\Base;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
        $teach=Teacher::with('Position')->paginate(8);
        if($re->query('search')){
            $teach=Teacher::where('first_name','LIKE','%'.$re->query('search').'%')
            ->orWhere('last_name','LIKE','%'.$re->query('search').'%')
            ->orWhere('email','LIKE','%'.$re->query('search').'%')->with('Position')->paginate(8);
        }
        $pos=Position::get(['id','position_name']);
        if($teach){
            return view('teachers.index',compact('teach','pos'));
        }
       
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
    public function store(StoreTeachRequest $re)
    {
        $teach=new Teacher();
        $teach->first_name=$re->first_name;
        $teach->last_name=$re->last_name;
        $teach->email=$re->email;
        $teach->gender=$re->gender;
        $teach->dob=$re->dob;
        $teach->phone=$re->phone;
        $teach->address=$re->address;
        $teach->description=$re->description;
        $teach->position_id=$re->position_id;
        $teach->created_by=$re->created_by;
        $teach->updated_by=$re->updated_by;
        if($teach->save()){
            return redirect('teachers')->with('message','One record created successfully');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$id) return back(404);
        $teach=Teacher::with('Position')->where('id',$id)->first();
        return view('teachers.view',compact('teach'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$id) return abort(404);
        $teach=Teacher::where('id',$id)->first();
        if(!$teach){
            return redirect('positions')
            ->with('message','Position not found');
        }
        $pos=Position::get(['id','position_name']);
        return view('teachers.update',compact('pos','teach'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTeachRequest $re,$id )
    {
        $teach=Teacher::find($id);
        $teach->first_name=$re->first_name;
        $teach->last_name=$re->last_name;
        $teach->email=$re->email;
        $teach->gender=$re->gender;
        $teach->dob=$re->dob;
        $teach->phone=$re->phone;
        $teach->address=$re->address;
        $teach->description=$re->description;
        $teach->position_id=$re->position_id;
        $teach->created_by=$re->created_by;
        $teach->updated_by=$re->updated_by;
        if($teach->save()){
            return redirect('teachers')->with('message','One record Updated successfully');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teach=Teacher::where('id',$id);
        if($teach->delete()){
            return redirect('teachers')->with('message','Teacher one record deleted successfully');
        }
    }
}
