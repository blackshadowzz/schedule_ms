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
          {{-- <div>
               <a href="" class="btn btn-info">PRINT</a>
          </div> --}}
             <div class="dropdown">
                  <button class="btn btn-md btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                          <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
                      </svg>
                      Filter
                  </button>
                  <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="">IT</a></li>
                  <li><a class="dropdown-item" href="">Marketing</a></li>
   
                  </ul>
              </div>
        </div>
     </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1"  aria-hidden="true">
     <div class="modal-dialog modal-xl" style="width: 40%">
          <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form action="{{ route('schedule.store') }}" method="post" class="" enctype="multipart/form-data">
                         @csrf
                    <div class="row">
                         <div class="col-md-12">
                              <!-- h -->
                              <div class="">
                                   <label for="schedule_name" class="form-label">Schedule Name</label>
                                   <input type="text" name="schedule_name" value="{{ old('schedule_name') }}" id="schedule_name" class="form-control" required placeholder="Schedule ...">
                                   @error('schedule_name')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                                   
                              </div>
                         </div>
                         
                    </div>
                    <div class="row mt-2">
                         <div class="col-md-6">
                              <!-- h -->
                              <div class="">
                                   <label for="semester_id" class="form-label">Semester</label>
                                   <select name="semester_id" id="semester_id" required class="form-select">
                                        <option value="" style="display: none">Select semester</option>
                                        @foreach ($sem as $s)
                                             <option value="{{ $s->id }}">{{ $s->semester_name }}</option>
                                        @endforeach
                                   </select>
                                   @error('semester_id')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                                   
                              </div>
                         </div>
                         <div class="col-md-6">
                              <!-- h -->
                              <div class="">
                                   <label for="subject_id" class="form-label">Subject</label>
                                   <select name="subject_id" id="subject_id" required class="form-select">
                                        <option value="" style="display: none">Select subject</option>
                                        @foreach ($sub as $s)
                                             <option value="{{ $s->id }}">{{ $s->subject_name }}</option>
                                        @endforeach
                                   </select>
                                   @error('subject_id')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                                   
                              </div>
                         </div>
                    </div>
                    <div class="mt-2">
                         <label for="time_id" class="form-label">Date Time</label>
                         <select name="time_id" id="time_id" required class="form-select">
                              <option value="" style="display: none">Select time</option>
                              @foreach ($time as $t)
                                   <option value="{{ $t->id }}">{{ $t->times }} ( {{ $t->days }} | {{ $t->start_date }} - {{ $t->end_date }} )</option>
                              @endforeach
                         </select>
                         @error('time_id')
                         <span class="text-danger">{{ $message }}</span>
                              
                         @enderror
                         
                    </div>
                    <div class="row mt-2">
                         <div class="col-md-6">
                              <label for="start_hour" class="form-label">Select Start Hour</label>
                              <input type="time" value="{{ old('start_hour') }}" name="start_hour" id="start_hour" class="form-control" placeholder=" ...">
                              @error('start_hour')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                         </div>
                         <div class="col-md-6">
                              <label for="end_hour" class="form-label">Select End Hour</label>
                              <input type="time" value="{{ old('end_hour') }}" name="end_hour" id="end_hour" class="form-control" placeholder=" ...">
                              @error('end_hour')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
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