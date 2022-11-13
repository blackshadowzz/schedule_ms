@extends('layouts.main')
@section('title','Update Course')
@push('Header')
    Course 
@endpush
@push('sub_Header')
     course / update
@endpush
@section('content')
     <div>
          <div class="modal-body">
               <form action="/courses/{{ $course->id }}" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    @method('put')
               <div class="row">
                    <div class="col-12">
                         <!-- h -->
                         <div class="">
                              <label for="course_name" class="form-label">Course Name</label>
                              <input type="text" name="course_name" value="{{ $course->course_name }}" class="form-control flex-col" id="course_name" required placeholder="Course name...">
                              @error('course_name')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
               </div>

               <div class="mt-2">
                    <label for="dob" class="form-label">Description</label>
                    <input type="text" name="description" value="{{ $course->description }}" id="description" class="form-control" required placeholder="Description...">
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
                         value="{{ $course->created_by }}">
               </div>
               <div class="">
                    {{-- <label for="" class="form-label">Update By</label> --}}
                    <input type="hidden" 
                         class="form-control" 
                         id="updated_by"  
                         name="updated_by"  
                         value="{{ Auth::user()->name }}">
               </div>

               <div class="d-flex justify-content-start mt-3">
                    <a href="/courses" class="btn btn-info mr-3">Back</a>
                    <button type="submit" style="float: right" class="btn btn-primary ">Update</button>
               </div>
                    
                    
               </form>
          </div>
     </div>
@endsection