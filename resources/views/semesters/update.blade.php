@extends('layouts.main')
@section('title','Update Semester')
@push('Header')
     Semester
@endpush
@push('sub_Header')
     <a href="/semesters">semester</a> / update
@endpush
@section('content')
     <div>
          <div class="modal-body">
               <form action="/semesters/{{ $sem->id }}" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    @method('put')
               <div class="row">
                    <div class="col-12">
                         <!-- h -->
                         <div class="">
                              <label for="semester_name" class="form-label">Semester</label>
                              <select name="semester_name" id="semester_name" class="form-select">
                                   <option value="{{ $sem->semester_name }}" style="display:none;">{{ $sem->semester_name }}</option>
                                   <option value="Semester One">Semester One</option>
                                   <option value="Semester Two">Semester Two</option>
                                   <option value="Semester Three">Semester Three</option>
                              </select>
                              @error('semester_name')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
               </div>

          
               <div class="mt-2">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" value="{{ $sem->description }}" name="description" id="description" class="form-control" placeholder="Description ...">
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
               </div>
          
               <div class="">
                    {{-- <label for="" class="form-label">Create By</label> --}}
                    <input type="hidden" 
                         class="form-control" 
                         id="updated_by" 
                         name="updated_by" 
                         value="{{ Auth::user()->name }}">
               </div>

               <div class=" d-flex justify-content-start mt-2">
                    <button type="submit"  class="btn btn-primary ">Update Data</button>
                    <a href="/semesters" class="btn btn-info ml-3">Back</a>
               </div>
                    
                    
               </form>
          </div>
     </div>
@endsection