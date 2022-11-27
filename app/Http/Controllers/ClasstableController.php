<?php

namespace App\Http\Controllers;

use App\Models\Classtable;
use Illuminate\Http\Request;

class ClasstableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
        $class=Classtable::all();
        if($re->query('search')){
            $class=Classtable::where('class_name','LIKE','%'.$re->query('search').'%')->all();
        }
        return view('classes.index',compact('class'));
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
        $class=$request->except(['_token','updated_by']);
        if(Classtable::create($class)){
            return redirect('classes')->with('message','One record was created successfully!');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classtable  $classtable
     * @return \Illuminate\Http\Response
     */
    public function show(Classtable $classtable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classtable  $classtable
     * @return \Illuminate\Http\Response
     */
    public function edit(Classtable $classtable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classtable  $classtable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classtable $classtable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classtable  $classtable
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Classtable::where('id', $id)->delete()){
            return redirect('classes')->with('message', 'Classtable record deleted successfully!');
        }
        return back();
    }
}
