@extends('layouts.main')
@section('title','View Student')
@push('Header')
     View Student
@endpush
@push('sub_Header')
     student / view
@endpush
@section('content')
     <div>
          <div class="container">
               <div class="card">
                    <div class="card-header">
     
                              <div class="row">
                                   <div class="col-md-6">
                                        <h3>Hello {{ $stu->first_name }} {{ $stu->last_name }}</h3>
                                   </div>
                                   <div class="col-md-6 d-flex justify-content-end" >
                                        <p class="text-muted">Created {{ $stu->created_at->format('d-M-Y') }}
                                              By {{ $stu->created_by }} | Updated {{ $stu->updated_at->format('d-M-Y') }} By {{ $stu->updated_by }}</p>
                                        
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
                                                       <th>No.</th>
                                                       <td class="code">{{ $stu->id }}</td>
                                                  </tr>
                                                  <tr>
                                                       <th>Fullname</th>
                                                       <td class="code">{{ $stu->first_name }} {{ $stu->last_name }}</td>
                                                  </tr>
                                                  <tr>
                                                       <th>Date of Birth</th>
                                                       <td>{{ $stu->dob }}</td>
                                                  </tr>
                                             
                                                  <tr>
                                                       <th>Gender</th>
                                                       <td>{{ $stu->gender }}</td>
                                                  </tr>
                                                  <tr>
                                                       <th>Address</th>
                                                       <td>{{ $stu->address }}</td>
                                                  </tr>
                                                  {{-- <tr>
                                                       <th>Province</th>
                                                       <td>{{ $emp->province }}</td>
                                                  </tr> --}}
                                                  <tr>
                                                       <th>Phone</th>
                                                       <td>{{ $stu->phone }}</td>
                                                  </tr>
                                                  
                                                  <tr>
                                                       <th>Email</th>
                                                       <td>{{ $stu->email }}</td>
                                                  </tr>
                                                  
                                             
                                             </tbody>
                                             
                                        </table>
                                   </div>
                              </div>
                            </div>
                    </div>
                    <div class="card-footer">
                         <div class="d-flex justify-content-end">
                              <a href="/students" class="btn btn-info mr-4">Back</a>
                              <a href="/students/{{ $stu->id }}/edit" class="btn btn-primary">Go To Update</a>
                         </div>
                    </div>
               </div>
             
         </div>
     </div>
@endsection