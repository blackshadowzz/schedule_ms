@extends('layouts.main')
@section('title','View Schedule')
@push('Header')
     View Schedule
@endpush
@push('sub_Header')
     view / <a href="/schedules">schedule</a>
@endpush
@section('content')
     
    <div class="container">
          <div class="card " style="font-family:'Noto Serif Khmer', serif;">
               <div class="card-header">

                         <div class="row">
                              <div class="col-md-6">
                                   <h3>Subject: {{ $sched->Subject->subject_name }} </h3>
                              </div>
                              <div class="col-md-6 d-flex justify-content-end" >
                                   <p class="text-muted">Created {{ $sched->created_at->format('d-M-Y') }}
                                         By {{ $sched->created_by }} | Updated {{ $sched->updated_at->format('d-M-Y') }} By {{ $sched->updated_by }}</p>
                                   
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
                                   <table class="table table-striped table-hover table-sm">
                                        <tbody>
                                             <tr>
                                                  <th>Class name</th>
                                                  <td class="code">{{ $sched->Classtable->class_name }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Room name</th>
                                                  <td class="code">{{ $sched->Room->room_name }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Teacher</th>
                                                  <td class="code">{{ $sched->Teacher->first_name }} {{ $sched->Teacher->last_name }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Semester</th>
                                                  <td class="code">{{ $sched->Semester->semester_name }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Class Time</th>
                                                  <td class="code">{{ $sched->time }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Class Day</th>
                                                  <td class="code">{{ $sched->day }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Class Date</th>
                                                  <td class="code">{{ $sched->start_date }} &nbsp;&nbsp; - &nbsp;&nbsp; {{ $sched->end_date }}</td>
                                             </tr>
                                
                                             <tr>
                                                  <th>
                                                      Class Hour
                                                  </th>
                                                  <td class="code">{{ $sched->start_hour }} &nbsp;&nbsp; - &nbsp;&nbsp; {{ $sched->end_hour }}</td>
                                             </tr>

                               
                             
                                        </tbody>
                                        
                                   </table>
                              </div>
                         </div>
                       </div>
               </div>
               <div class="card-footer">
                    <div class="d-flex justify-content-end">
                         <a href="/schedules" class="btn btn-info mr-4">Back</a>
                         <a href="/schedules/{{ $sched->id }}/edit" class="btn btn-primary">Go To Update</a>
                    </div>
               </div>
          </div>
        
    </div>
@endsection