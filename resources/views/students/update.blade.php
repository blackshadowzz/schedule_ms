@extends('layouts.main')
@section('title','Update Student')
@push('Header')
     Update Student
@endpush
@push('sub_Header')
     student / update
@endpush
@section('content')
     <div>
          <div class="modal-body">
               <form action="/students/{{ $stu->id }}" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    @method('put')
               <div class="row">
                    <div class="col-6">
                         <!-- h -->
                         <div class="">
                              <label for="" class="form-label">First Name</label>
                              <input type="text" name="first_name" value="{{ $stu->first_name }}" class="form-control flex-col" id="first_name" required placeholder="First name...">
                              @error('first_name')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
                    <div class="col-6">
                         <div class="mt-2">
                              <label for="last_name" class="form-label">Last Name</label>
                              <input type="text" name="last_name" value="{{ $stu->last_name }}" class="form-control flex-col" id="last_name" required placeholder="Last name...">
                              @error('last_name')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>

                    </div>
               </div>
                    <div class="row">
                         <div class="col mt-2">
                              <label for="dob" class="form-label">Date of birth</label>
                              <input type="date" value="{{ $stu->dob }}" name="dob" id="dob" class="form-control" required>
                              @error('dob')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                         </div>
               
                         <div class="col mt-2">
                              <label for="" class="form-label">Gender</label>
                              <select name="gender" id="gender" class="form-select" required>
                                   <option value="{{ $stu->gender }}" style="display: none;">{{ $stu->gender }}</option>
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
                              <input type="text" name="phone" value="{{ $stu->phone }}" class="form-control flex-col" id="phone" required placeholder="Phone...">
                              @error('phone')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                         <div class="col-6 mt-2">
                              <label for="" class="form-label">Email</label>
                              <input type="email" name="email" value="{{ $stu->email }}" class="form-control flex-col" id="email" required placeholder="Email...">
                              @error('email')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                         </div>
                    
                    </div>
                    
                    <div class=" mt-2">
                         <label for="address" class="form-label">Address</label>
                         <input type="text" name="address" id="address" value="{{ $stu->address }}" class="form-control" placeholder="Address">
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
                              value="{{ $stu->created_by }}">
                    </div>
                    <div class="">
                         {{-- <label for="" class="form-label">Update By</label> --}}
                         <input type="hidden" 
                              class="form-control" 
                              id="updated_by" 
                              name="updated_by"  
                              value="{{ Auth::user()->name }}">
                    </div>

               <div class="d-flex justify-content-end mt-2">
                    <a href="/students" class="btn btn-info mr-3">Back</a>
                    <button type="submit" style="float: right" class="btn btn-primary ">Update Now</button>
               </div>
                    
                    
               </form>
          </div>
     </div>
@endsection