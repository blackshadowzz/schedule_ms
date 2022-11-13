@extends('layouts.main')
@section('title','Update Subject')
@push('Header')
     Update Subject
@endpush
@push('sub_Header')
     subject / update
@endpush
@section('content')
     <div>
          <div class="modal-body m-2">
               <form action="/subjects/update/{{ $sub->id }}" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    @method('put')
               <div class="row">
                    <div class="col-12">
                         <!-- h -->
                         <div class="">
                              <label for="subject_name" class="form-label">Subject Name</label>
                              <input type="text" name="subject_name" value="{{ $sub->subject_name }}" class="form-control flex-col" id="subject_name" required placeholder="Subject name...">
                              @error('subject_name')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
               </div>

               <div class="mt-2">
                    <label for="credit" class="form-label">Credit</label>
                    <input type="text" name="credit" value="{{ $sub->credit }}" id="credit" class="form-control" required placeholder="Credit...">
                    @error('credit')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
               </div>   
               <div class="mt-2">
                    <label for="course_id" class="form-label">Course</label>
                    <select name="course_id" class="form-control" id="course_id">
                         <option value="{{ $sub->course_id }}" style="display: none;">{{ $sub->Course->course_name }}</option>
                         @foreach($course as $c)
                              <option value="{{ $c->id }}">{{ $c->course_name }}</option>
                         @endforeach
                    </select>
                    @error('course_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
               </div> 
               <div class="mt-2">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" value="{{ $sub->description }}" id="description" class="form-control" required placeholder="Description...">
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
                         value="{{ $sub->created_by }}">
               </div>
               <div class="">
                    {{-- <label for="" class="form-label">Update By</label> --}}
                    <input type="hidden" 
                         class="form-control" 
                         id="updated_by"  
                         name="updated_by"  
                         value="{{ Auth::user()->name }}">
               </div>

               <div class="d-flex justify-content-start mt-2">
                    <a href="/subjects" class="btn btn-info mr-3">Back</a>
                    <button type="submit" style="float: right" class="btn btn-primary ">Update Now</button>
               </div>
                    
                    
               </form>
          </div>
     </div>
@endsection