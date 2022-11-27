<div class="d-flex justify-content-between">
     <div class="part-create">
        <button type="button" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="">Add New</button>

     </div>
     <div class="part-search">
        <form action="/schedules" method="get">
             <div class="input-group">
                  <span class="input-group-text" id="search-box">Search</span>
                  <input type="search" name="search" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1">
                  <button type="submit" class="btn btn-info">Search</button>
             </div>
        </form>
     </div>
     <div class="part-filter">
        <div class="" style="float: right;">
          <div>
               <a href="" class="btn btn-info">PRINT</a>
          </div>
          
        </div>
     </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1"  aria-hidden="true">
     <div class="modal-dialog modal-xl" style="width: 50%">
          <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form action="/schedules" method="post" class="" enctype="multipart/form-data">
                         @csrf
                    <div class="row">
                         <div class="col-12">
                              <!-- h -->
                              <div class="">
                                   <label for="classtable_id" class="form-label">Class Name</label>
                                   <select name="classtable_id" id="classtable_id" class="form-select">
                                        <option value="" style="display: none">Select class</option>
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
                                        <option value="" style="display: none">Select subject</option>
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
                                        <option value="" style="display: none">Select teacher</option>
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
                                        <option value="" style="display: none">Select semester</option>
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
                                        <option value="" style="display: none">Select room</option>
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
                                   <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
                                   @error('start_date')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                                   
                              </div>
                         </div>
                         <div class="col-6">
                              <!-- h -->
                              <div class="">
                                   <label for="end_date" class="form-label">End Date</label>
                                   <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}" required>
                                   @error('end_date')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                                   
                              </div>
                         </div>
                    </div>
                    <div class="row mt-2">
                         <div class="col-6">
                              <!-- h -->
                              <div class="">
                                   <label for="time" class="form-label">Time</label>
                                   <select name="time" id="time" class="form-select">
                                        <option value="" style="display: none">Select time </option>
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
                                        <option value="" style="display: none">Choose day</option>
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
                                   <input type="time" name="start_hour" class="form-control" value="{{ old('start_hour') }}" required>
                                   @error('start_hour')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                                   
                              </div>
                         </div>
                         <div class="col-6">
                              <!-- h -->
                              <div class="">
                                   <label for="end_hour" class="form-label">End Date</label>
                                   <input type="time" name="end_hour" class="form-control" value="{{ old('end_hour') }}" required>
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
                              id="created_by" 
                              name="created_by" 
                              value="{{ Auth::user()->name }}">
                    </div>

                    <div class="modal-footer mt-2">
                         <button type="submit" style="float: right" class="btn btn-info ">Add New</button>
                    </div>
                         
                         
                    </form>
               </div>
          </div>
     </div>
</div>