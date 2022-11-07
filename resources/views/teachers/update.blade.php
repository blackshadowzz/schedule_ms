@extends('layouts.main')
@section('title','Update Teacher')
@push('Header')
     Update teacher
@endpush
@push('sub_Header')
     teacher / update
@endpush
@section('content')
<div class="modal-body">
     <form action="/teachers/{{ $teach->id }}" method="post" class="" enctype="multipart/form-data">
          @csrf
          @method('put')
     <div class="row">
          <div class="col-6">
               <!-- h -->
               <div class="">
                    <label for="" class="form-label">First Name</label>
                    <input type="text" name="first_name" value="{{ $teach->first_name }}" class="form-control flex-col" id="first_name" required placeholder="First name...">
                    @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                         
                    @enderror
                    
               </div>
          </div>
          <div class="col-6">
               <div class="mt-2">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" value="{{ $teach->last_name }}" class="form-control flex-col" id="last_name" required placeholder="Last name...">
                    @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                         
                    @enderror
                    
               </div>

          </div>
     </div>
          <div class="row">
               <div class="col mt-2">
                    <label for="dob" class="form-label">Date of birth</label>
                    <input type="date" value="{{ $teach->dob }}" name="dob" id="dob" class="form-control" required>
                    @error('dob')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
               </div>
     
               <div class="col mt-2">
                    <label for="" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-select" required>
                         <option value="{{ $teach->gender }}" style="display:none;">{{ $teach->gender }}</option>
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
                    <input type="text" name="phone" value="{{ $teach->phone }}" class="form-control flex-col" id="phone" required placeholder="Phone...">
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                         
                    @enderror
                    
               </div>
               <div class="col-6 mt-2">
                    <label for="" class="form-label">Position</label>
                    <select name="position_id" id="position_id"  class="form-control">
                         <option value="{{ $teach->position_id }}" style="display:none;">{{ $teach->Position->position_name }}</option>
                         @foreach ($pos as $p )
                              <option value="{{ $p->id }}">{{ $p->position_name }}</option>
                         @endforeach
                    </select>
                    @error('position_id')
                    <span class="text-danger">{{ $message }}</span>
                         
                    @enderror
               </div>
          
          </div>
          <div class=" mt-2">
               <label for="" class="form-label">Email</label>
               <input type="email" name="email" value="{{ $teach->email }}" class="form-control flex-col" id="email" required placeholder="Email...">
               @error('email')
               <span class="text-danger">{{ $message }}</span>
                    
               @enderror
          </div>
          <div class=" mt-2">
               <label for="address" class="form-label">Address</label>
               <input type="text" name="address" id="address" value="{{ $teach->address }}" class="form-control" placeholder="Address">
               @error('address')
               <span class="text-danger">{{ $message }}</span>
                    
               @enderror
          </div>   
          <div class=" mt-2">
               <label for="description" class="form-label">Description</label>
               <input type="text" name="description" id="description" value="{{ $teach->description }}" class="form-control" placeholder="description">
               @error('description')
               <span class="text-danger">{{ $message }}</span>
                    
               @enderror
          </div>   
          <div class="">
               {{-- <label for="" class="form-label">Update By</label> --}}
               <input type="hidden" 
                    class="form-control" 
                    id="updated_by"
                    name="updated_by"
                    value="{{ Auth::user()->name }}">
          </div>
          <div class="">
               {{-- <label for="" class="form-label">Create By</label> --}}
               <input type="hidden" 
                    class="form-control" 
                    id="created_by"
                    name="created_by"
                    value="{{ $teach->created_by }}">
          </div>

     <div class="d-flex justify-content-end mt-2">
          <a href="/teachers" class="btn btn-info mr-3">Back</a>
          <button type="submit" style="float: right" class="btn btn-info ">Update Now</button>
     </div>
          
          
     </form>
</div>
@endsection