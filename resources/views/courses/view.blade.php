@extends('layouts.main')
@section('title','View Teacher')
@push('Header')
     View course
@endpush
@push('sub_Header')
     view / course
@endpush
@section('content')
     
    <div class="container">
          <div class="card">
               <div class="card-header">

                         {{-- <div class="row">
                              <div class="col-md-6">
                                   <h3>Hello {{ $teach->first_name }} {{ $teach->last_name }}</h3>
                              </div>
                              <div class="col-md-6 d-flex justify-content-end" >
                                   <p class="text-muted">Created {{ $teach->created_at->format('d-M-Y') }}
                                         By {{ $teach->created_by }} | Updated {{ $teach->updated_at->format('d-M-Y') }} By {{ $teach->updated_by }}</p>
                                   
                              </div>
                         </div> --}}
               
               </div>
               <div class="card-body">
                    <div class="row">
                    
                         <div class="col-12">
                              <div class="table-responsive">
                                   <table class="table table-striped table-hover">
                                        <tbody>
                                             <tr>
                                                  <th>ID</th>
                                                  <td class="code">{{ $course->id }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Course Name</th>
                                                  <td class="code">{{ $course->course_name }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Description</th>
                                                  <td>{{ $course->description}}</td>
                                             </tr>
                                             <tr>
                                                  <th>Created By</th>
                                                  <td>{{ $course->created_by }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Created Date</th>
                                                  <td>{{ $course->created_at }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Updated By</th>
                                                  <td>{{ $course->updated_by }}</td>
                                             </tr>
                                             {{-- <tr>
                                                  <th>Province</th>
                                                  <td>{{ $emp->province }}</td>
                                             </tr> --}}
                                             <tr>
                                                  <th>Updated Date</th>
                                                  <td>{{ $course->updated_at }}</td>
                                             </tr>
                                             
                                        </tbody>
                                        
                                   </table>
                              </div>
                         </div>
                       </div>
               </div>
               <div class="card-footer">
                    <div class="d-flex justify-content-end">
                         <a href="/courses" class="btn btn-info mr-4">Back</a>
                         <a href="/courses/{{ $course->id }}/edit" class="btn btn-primary">Go To Update</a>
                    </div>
               </div>
          </div>
        
    </div>
@endsection