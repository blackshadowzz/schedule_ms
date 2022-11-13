<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
        $room=Room::with('building')->get();
        if($re->query('search')){
            $room=Room::where('room_name','LIKE','%'.$re->query('search').'%')->with('building')->get();
        }
        $build=Building::get(['id','building_name']);
        return view('rooms.index',compact('room','build'));
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
        $room=new Room();
        $room->room_name=$request->room_name;
        $room->floor=$request->floor;
        $room->building_id=$request->building_id;
        $room->description=$request->description;
        $room->created_by=$request->created_by;
        if($room->save()){
            return redirect('rooms')->with('message','Room record created successfully');
        }
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $room=Room::find($room->id)->with('building')->first();
        return view('rooms.view',compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$id) return back(404);
        $room=Room::where('id', $id)->first();
        $build=Building::get(['id','building_name']);
        return view('rooms.update',compact('room','build'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $room=Room::find($room->id);
        $room->room_name=$request->room_name;
        $room->floor=$request->floor;
        $room->building_id=$request->building_id;
        $room->description=$request->description;
        $room->created_by=$request->created_by;
        $room->updated_by=$request->updated_by;
        
        if($room->save()){
            return redirect('rooms')->with('message','Room record updated successfully');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        if(Room::where('id', $room->id)->delete());
        {
            return redirect('rooms')->with('message','Room record deleted successfully');
        }
        return back();
    }
}
