@extends('layouts.main')
@section('title','View Teacher')
@push('Header')
     View teacher
@endpush
@push('sub_Header')
     view / teacher
@endpush
@section('content')
     
    <div class="container">
          <div class="card">
               <div class="card-header">

                         <div class="row">
                              <div class="col-md-6">
                                   <h3>Hello {{ $teach->first_name }} {{ $teach->last_name }}</h3>
                              </div>
                              <div class="col-md-6 d-flex justify-content-end" >
                                   <p class="text-muted">Created {{ $teach->created_at->format('d-M-Y') }}
                                         By {{ $teach->created_by }} | Updated {{ $teach->updated_at->format('d-M-Y') }} By {{ $teach->updated_by }}</p>
                                   
                              </div>
                         </div>
               
               </div>
               <div class="card-body">
                    <div class="row">
                         {{-- <div class="col-4">
                              <div class="profile-img">
                                   <img class="rounded-circle" src="/storage/employees/profile/{{ $emp->image_path }}" alt="">
                              </div>
                              <div>
                                   <table class="table table-striped">
                                        <tr>
                                             <th>ID</th>
                                             <td>{{ $emp->id }}</td>
                                        </tr>
                                   </table>
                              </div>
               
                         </div> --}}
                         <div class="col-12">
                              <div class="table-responsive">
                                   <table class="table table-striped table-hover">
                                        <tbody>
                                             <tr>
                                                  <th>ID</th>
                                                  <td class="code">{{ $teach->id }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Fullname</th>
                                                  <td class="code">{{ $teach->first_name }} {{ $teach->last_name }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Position</th>
                                                  <td>{{ $teach->Position->position_name }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Date of Birth</th>
                                                  <td>{{ $teach->dob }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Gender</th>
                                                  <td>{{ $teach->gender }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Address</th>
                                                  <td>{{ $teach->address }}</td>
                                             </tr>
                                             {{-- <tr>
                                                  <th>Province</th>
                                                  <td>{{ $emp->province }}</td>
                                             </tr> --}}
                                             <tr>
                                                  <th>Phone</th>
                                                  <td>{{ $teach->phone }}</td>
                                             </tr>
                                             
                                             <tr>
                                                  <th>Description</th>
                                                  <td>{{ $teach->description }}</td>
                                             </tr>
                                        </tbody>
                                        
                                   </table>
                              </div>
                         </div>
                       </div>
               </div>
               <div class="card-footer">
                    <div class="d-flex justify-content-end">
                         <a href="/teachers" class="btn btn-info mr-4">Back</a>
                         <a href="/teachers/{{ $teach->id }}/edit" class="btn btn-primary">Go To Update</a>
                    </div>
               </div>
          </div>
        
    </div>
@endsection