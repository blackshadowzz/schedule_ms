@extends('layouts.main')
@section('title','Student Class')
@push('Header')
     Update student and class
@endpush
@push('sub_Header')
     <a href="/student_classes">student_class</a> / update
@endpush
@section('content')
     <div>
          <div class="modal-body">
               <form action="/student_classes/{{ $stu_class->id }}" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    @method('put')
               <div class="row">
                    <div class="col-12">
                         <!-- h -->
                         <div class="">
                              <label for="student_id" class="form-label">Student Name</label>
                              <select name="student_id" id="search_box" data-search="true" id="student_id" class="form-select">
                                   <option value="{{ $stu_class->student_id }}" style="display: none">
                                        {{ $stu_class->Student->first_name }}
                                        {{ $stu_class->Student->last_name }}
                                   </option>
                                   @foreach ($stu as $s)
                                        <option value="{{ $s->id }}">{{ $s->first_name }} {{ $s->last_name }}</option>
                                   @endforeach
                              </select>
                              @error('class_name')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    </div>
               </div>
               <div class="mt-2">
                    <label for="classtable_id" class="form-label">Class Name</label>
                    <select name="classtable_id" id="classtable_id" class="form-select">
                         <option value="{{ $stu_class->classtable_id }}" style="display: none">{{ $stu_class->class_name }}</option>
                         @foreach ($class as $c)
                              <option value="{{ $c->id }}">{{ $c->class_name }}</option>
                         @endforeach
                    </select>
                    @error('classtable_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
               </div>
               

               <div class="modal-footer mt-2">
                    <button type="submit" style="float: right" class="btn btn-info ">Add New</button>
               </div>
                    
                    
               </form>
          </div>
     </div>     
@endsection