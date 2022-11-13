@extends('layouts.main')
@section('title','View Subject')
@push('Header')
     View subject
@endpush
@push('sub_Header')
     view / subject
@endpush
@section('content')
     
    <div class="container">
          <div class="card">
               <div class="card-header">

                         <div class="row">
                              <div class="col-md-5">
                                   {{-- <h3>Hello {{ $teach->first_name }} {{ $teach->last_name }}</h3> --}}
                              </div>
                              <div class="col-md-7 d-flex justify-content-end" >
                                   <p class="text-muted">Created {{ $sub->created_at->format('d-M-Y') }}
                                         By {{ $sub->created_by }} | Updated {{ $sub->updated_at->format('d-M-Y') }} By {{ $sub->updated_by }}</p>
                                   
                              </div>
                         </div>
               
               </div>
               <div class="card-body">
                    <div class="row">
             
                         <div class="col-12">
                              <div class="table-responsive">
                                   <table class="table table-striped table-hover">
                                        <tbody>
                                             <tr>
                                                  <th>ID</th>
                                                  <td class="code">{{ $sub->id }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Subject Name</th>
                                                  <td class="code">{{ $sub->subject_name }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Course Name</th>
                                                  <td>{{ $sub->Course->course_name }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Credit</th>
                                                  <td>{{ $sub->credit }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Description</th>
                                                  <td>{{ $sub->description }}</td>
                                             </tr>
                                             
                                            
                                        </tbody>
                                        
                                   </table>
                              </div>
                         </div>
                       </div>
               </div>
               <div class="card-footer">
                    <div class="d-flex justify-content-end">
                         <a href="/subjects" class="btn btn-info mr-4">Back</a>
                         <a href="/subjects/{{ $sub->id }}/edit" class="btn btn-primary">Go To Update</a>
                    </div>
               </div>
          </div>
        
    </div>
@endsection