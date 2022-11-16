@extends('layouts.main')
@section('title','Update Time')
@push('Header')
     Update Time
@endpush
@push('sub_Header')
     <a href="/times">time</a> / update
@endpush
@section('content')
     <div>
          <div class="modal-body">
               <form action="/times/{{ $time->id }}" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    @method('put')
               <div class="row">
                    <div class="col-12">
                         <!-- h -->
                         <div class="">
                              <label for="times" class="form-label">Times</label>
                              <select name="times" id="times" class="form-select">
                                   <option value="{{ $time->times }}" style="display:none;">{{ $time->times }}</option>
                                   <option value="Morning">Morning</option>
                                   <option value="Evening">Evening</option>
                                   <option value="Night">Night</option>
                              </select>
                              @error('times')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
               </div>

               <div class="mt-2">
                    <label for="days" class="form-label">Days</label>
                    <select name="days" id="days" class="form-select" >
                         <option value="{{ $time->days }}" style="display: none" >{{ $time->days }}</option>
                         <option value="Monday">Monday</option>
                         <option value="Tuesday">Tuesday</option>
                         <option value="Wednesday">Wednesday</option>
                         <option value="Thirsday">Thirsday</option>
                         <option value="Friday">Friday</option>
                         <option value="Saturday">Saturday</option>
                         <option value="Sunday">Sunday</option>
                         <option value="Monday-Saturday">Monday-Saturday</option>
                         <option value="Monday-Friday">Monday-Friday</option>
                         <option value="Mon-Tue-Wed">Mon-Tue-Wed</option>
                         <option value="Saturday-Sunday">Saturday-Sunday</option>
                         <option value="Mon-Wed-Fri">Mon-Wed-Fri</option>
                    </select>

                    {{-- <div class="form-check form-check-inline">
                         <input class="form-check-input" type="checkbox" name="days[]" id="inlineCheckbox1" value="Monday">
                         <label class="form-check-label" for="inlineCheckbox1">Monday</label>
                    </div>
                    <div class="form-check form-check-inline">
                         <input class="form-check-input" type="checkbox" name="days[]" id="inlineCheckbox2" value="Tuesday">
                         <label class="form-check-label" for="inlineCheckbox2">Tuesday</label>
                    </div> --}}
                       
                    @error('days')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
               </div>
               
               <div class="mt-2">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" value="{{ $time->start_date }}" name="start_date" id="start_date" class="form-control" placeholder="Start date ...">
                    @error('start_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
               </div>
               <div class="mt-2">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" value="{{ $time->end_date }}" name="end_date" id="end_date" class="form-control" placeholder="End date ...">
                    @error('end_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
               </div>
               {{-- <div class="">
                    {{-- <label for="" class="form-label">Create By</label> 
                    <input type="hidden" 
                         class="form-control" 
                         id="created_by" 
                         name="created_by" 
                         value="{{ $time->days }}">
               </div> --}}
               <div class="">
                    {{-- <label for="" class="form-label">Create By</label> --}}
                    <input type="hidden" 
                         class="form-control" 
                         id="updated_by"  
                         name="updated_by"  
                         value="{{ Auth::user()->name }}">
               </div>

               <div class="modal-footer d-flex justify-content-start mt-2">
                    <button type="submit" class="btn btn-primary ">Update Now</button>
                    <a href="/times" class="btn btn-info ml-3">Back</a>
               </div>
                    
                    
               </form>
          </div>
     </div>
@endsection