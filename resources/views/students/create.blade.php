<div class="d-flex justify-content-between">
     <div class="part-create">
        <button type="button" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="">Add New</button>

     </div>
     <div class="part-search">
        <form action="/students" method="get">
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
     <div class="modal-dialog modal-xl" style="width: 45%">
          <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form action="/students" method="post" class="" enctype="multipart/form-data">
                         @csrf
                    <div class="row">
                         <div class="col-6">
                              <!-- h -->
                              <div class="">
                                   <label for="" class="form-label">First Name</label>
                                   <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control flex-col" id="first_name" required placeholder="First name...">
                                   @error('first_name')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                                   
                              </div>
                         </div>
                         <div class="col-6">
                              <div class="mt-2">
                                   <label for="last_name" class="form-label">Last Name</label>
                                   <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control flex-col" id="last_name" required placeholder="Last name...">
                                   @error('last_name')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                                   
                              </div>

                         </div>
                    </div>
                         <div class="row">
                              <div class="col mt-2">
                                   <label for="dob" class="form-label">Date of birth</label>
                                   <input type="date" name="dob" id="dob" class="form-control" required>
                                   @error('dob')
                                   <span class="text-danger">{{ $message }}</span>
                                   @enderror
                              </div>
                    
                              <div class="col mt-2">
                                   <label for="" class="form-label">Gender</label>
                                   <select name="gender" id="gender" class="form-select" required>
                                        <option value="" style="display: none;">Choose gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                   </select>
                                   @error('gender')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                                   
                              </div>
                         </div>
                    
                         <div class="row">
                              <div class="col-6 mt-2">
                                   <label for="" class="form-label">Phone</label>
                                   <input type="text" name="phone" value="{{ old('phone') }}" class="form-control flex-col" id="phone" required placeholder="Phone...">
                                   @error('phone')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                                   
                              </div>
                              <div class="col-6 mt-2">
                                   <label for="" class="form-label">Email</label>
                                   <input type="email" name="email" value="{{ old('email') }}" class="form-control flex-col" id="email" required placeholder="Email...">
                                   @error('email')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                              </div>
                         
                         </div>
                         
                         <div class=" mt-2">
                              <label for="address" class="form-label">Address</label>
                              <input type="text" name="address" id="address" value="{{ old('address') }}" class="form-control" placeholder="Address">
                              @error('address')
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