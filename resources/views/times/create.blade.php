<div class="d-flex justify-content-between">
     <div class="part-create">
        <button type="button" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="">Add New</button>

     </div>
     <div class="part-search">
        <form action="/times" method="get">
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
               {{-- <a href="" class="btn btn-info">PRINT</a> --}}
          </div>
             {{-- <div class="dropdown">
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
              </div> --}}
        </div>
     </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1"  aria-hidden="true">
     <div class="modal-dialog modal-xl" style="width: 40%">
          <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form action="/times" method="post" class="" enctype="multipart/form-data">
                         @csrf
                    <div class="row">
                         <div class="col-12">
                              <!-- h -->
                              <div class="">
                                   <label for="times" class="form-label">Times</label>
                                   <select name="times" id="times" class="form-select">
                                        <option value="" style="display:none;">Choose time</option>
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
                              <option value="" style="display: none" >Select days</option>
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
                         <input type="date" value="{{ old('start_date') }}" name="start_date" id="start_date" class="form-control" placeholder="Start date ...">
                         @error('start_date')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>
                    <div class="mt-2">
                         <label for="end_date" class="form-label">End Date</label>
                         <input type="date" value="{{ old('end_date') }}" name="end_date" id="end_date" class="form-control" placeholder="End date ...">
                         @error('end_date')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
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