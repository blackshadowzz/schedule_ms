@extends('layouts.main')
@section('title','Update Schedule')
@push('Header')
     Update Schedule
@endpush
@push('sub_Header')
     update / <a href="/schedules">schedule</a>
@endpush
@section('content')
     <div>
          <div class="modal-body">
               <form action="/schedules/{{ $sched->id }}" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    @method('put')
               <div class="row">
                    <div class="col-12">
                         <!-- h -->
                         <div class="">
                              <label for="classtable_id" class="form-label">Class Name</label>
                              <select name="classtable_id" id="classtable_id" class="form-select">
                                   <option value="{{ $sched->classtable_id }}" style="display: none">{{ $sched->Classtable->class_name }}</option>
                                   @foreach ($class as $c)
                                        <option value="{{ $c->id }}">{{ $c->class_name }}</option>
                                   @endforeach
                              </select>
                              @error('class_name')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
                    
               </div>
               <div class="row mt-2">

                    <div class="col-6">
                         <!-- h -->
                         <div class="">
                              <label for="subject_id" class="form-label">Subject</label>
                              <select name="subject_id" id="subject_id" class="form-select">
                                   <option value="{{ $sched->subject_id }}" style="display: none">{{ $sched->Subject->subject_name }}</option>
                                   @foreach ($sub as $s)
                                        <option value="{{ $s->id }}">{{ $s->subject_name }}</option>
                                   @endforeach
                              </select>
                              @error('class_name')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
                    <div class="col-6">
                         <!-- h -->
                         <div class="">
                              <label for="teacher_id" class="form-label">Teacher</label>
                              <select name="teacher_id" id="teacher_id" class="form-select">
                                   <option value="{{ $sched->teacher_id }}" style="display: none">{{ $sched->Teacher->first_name }}
                                         {{ $sched->Teacher->last_name }}</option>
                                   @foreach ($teach as $t)
                                        <option value="{{ $t->id }}">{{ $t->first_name }} {{ $t->last_name }}</option>
                                   @endforeach
                              </select>
                              @error('class_name')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
               </div>
               <div class="row mt-2">
                    <div class="col-6">
                         <!-- h -->
                         <div class="">
                              <label for="semester_id" class="form-label">Semester</label>
                              <select name="semester_id" id="semester_id" class="form-select">
                                   <option value="{{ $sched->semester_id }}" style="display: none">{{ $sched->Semester->semester_name }}</option>
                                   @foreach ($sem as $s)
                                        <option value="{{ $s->id }}">{{ $s->semester_name }}</option>
                                   @endforeach
                              </select>
                              @error('class_name')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
                    <div class="col-6">
                         <!-- h -->
                         <div class="">
                              <label for="room_id" class="form-label">Room</label>
                              <select name="room_id" id="room_id" class="form-select">
                                   <option value="{{ $sched->room_id }}" style="display: none">{{ $sched->Room->room_name }}</option>
                                   @foreach ($room as $r)
                                        <option value="{{ $r->id }}">{{ $r->room_name }}</option>
                                   @endforeach
                              </select>
                              @error('class_name')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
               </div>
               <div class="row mt-2">
                    <div class="col-6">
                         <!-- h -->
                         <div class="">
                              <label for="start_date" class="form-label">Start Date</label>
                              <input type="date" name="start_date" class="form-control" value="{{ $sched->start_date }}" required>
                              @error('start_date')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
                    <div class="col-6">
                         <!-- h -->
                         <div class="">
                              <label for="end_date" class="form-label">End Date</label>
                              <input type="date" name="end_date" class="form-control" value="{{ $sched->end_date }}" required>
                              @error('end_date')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
               </div>
               <div class="row mt-2">
                    <div class="col-6">
                         
                         <div class="">
                              <label for="time" class="form-label">Time</label>
                              <select name="time" id="time" class="form-select">
                                   <option value="{{ $sched->time }}" style="display: none">{{ $sched->time }} </option>
                                   <option value="Morning">Morning</option>
                                   <option value="Evening">Evening</option>
                              </select>
                              @error('start_date')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
                    <div class="col-6">
                         <!-- h -->
                         <div class="">
                              <label for="day" class="form-label">Day</label>
                              <select name="day" id="day" class="form-select">
                                   <option value="{{ $sched->day }}" style="display: none">{{ $sched->day }}</option>
                                   <option value="Monday">Monday</option>
                                   <option value="Tuesday">Tuesday</option>
                                   <option value="Wednesday">Wednesday</option>
                                   <option value="Thursday">Thursday</option>
                                   <option value="Friday">Friday</option>
                                   <option value="Saturday">Saturday</option>
                                   <option value="Sunday">Sunday</option>
                              </select>
                              @error('day')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
               </div>
               <div class="row mt-2">
                    <div class="col-6">
                         <!-- h -->
                         <div class="">
                              <label for="start_hour" class="form-label">Start Hour</label>
                              <input type="time" name="start_hour" class="form-control" value="{{ $sched->start_hour }}" required>
                              @error('start_hour')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
                    <div class="col-6">
                         <!-- h -->
                         <div class="">
                              <label for="end_hour" class="form-label">End Date</label>
                              <input type="time" name="end_hour" class="form-control" value="{{ $sched->end_hour }}" required>
                              @error('end_hour')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
               </div>
          
               <div class="">
                    {{-- <label for="" class="form-label">Create By</label> --}}
                    <input type="hidden" 
                         class="form-control" 
                         id="updated_by" 
                         name="updated_by" 
                         value="{{ Auth::user()->name }}">
               </div>

               <div class="d-flex justify-content-between mt-3">
                    
                   <div>
                         <a href="/schedules" class="btn btn-outline-info">Back To List</a>
                   </div>
                   <div>
                         <button type="submit" style="float: right" class="btn btn-primary ">Save</button>
                    </div>
               </div>
                    
                    
               </form>
          </div>
     </div>
@endsection