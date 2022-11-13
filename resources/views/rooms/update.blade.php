@extends('layouts.main')
@section('title','Update Room')
@push('Header')
     Update Room
@endpush
@push('sub_Header')
     room / update
@endpush
@section('content')
     <div>
          <div class="modal-body">
               <form action="/rooms/{{ $room->id }}" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    @method('put')
               <div class="row">
                    <div class="col-12">
                         <!-- h -->
                         <div class="">
                              <label for="room_name" class="form-label">Room Name</label>
                              <input type="text" name="room_name" value="{{ $room->room_name }}" class="form-control flex-col" id="room_name" required placeholder="Room name...">
                              @error('room_name')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
               </div>

               <div class="mt-2">
                    <label for="floor" class="form-label">Floor</label>
                    <select name="floor" id="floor" class="form-select" >
                         <option value="{{ $room->floor }}" style="display: none" >{{ $room->floor }}</option>
                         <option value="Zero">Zero</option>
                         <option value="First">First</option>
                         <option value="Second">Second</option>
                         <option value="Third">Third</option>
                    </select>
                    @error('floor')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
               </div>
               <div class="mt-2">
                    <label for="building_id" class="form-label">Building</label>
                    <select name="building_id" id="building_id"  class="form-select" >
                         <option value="{{ $room->building_id }}" style="display: none">{{ $room->Building->building_name }}</option>
                         @foreach ($build as $b)
                              <option value="{{ $b->id }}">{{ $b->building_name }}</option>
                         @endforeach
                    </select>
                    @error('building_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
               </div>
               <div class="mt-2">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" value="{{ $room->description }}" name="description" id="description" class="form-control" placeholder="Description...">
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
               </div>
               <div class="">
                    {{-- <label for="" class="form-label">Create By</label> --}}
                    <input type="hidden" 
                         class="form-control" 
                         id="created_by" 
                         name="created_by" 
                         value="{{ $room->created_by }}">
               </div>
               <div class="">
                    {{-- <label for="" class="form-label">Create By</label> --}}
                    <input type="hidden" 
                         class="form-control" 
                         id="updated_by" 
                         name="updated_by" 
                         value="{{ Auth::user()->name }}">
               </div>

               <div class="d-flex justify-content-start mt-3">
                    <a href="/rooms" class="btn btn-info mr-3">Back</a>
                    <button type="submit" style="float: right" class="btn btn-primary ">Update Now</button>
               </div>
                    
                    
               </form>
          </div>
     </div>
@endsection