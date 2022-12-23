@extends('layouts.main')
@section('title','View Student Schedule')
@push('Header')
     View Student Schedule
@endpush
@push('sub_Header')
     view / <a href="/student_classes">student_class</a>
@endpush
@section('content')
     
    <div class="container">
          <div class="card " style="font-family:'Noto Serif Khmer', serif;">
               <div class="card-header">

                         <div class="row">
                              <div class="col-md-6">
                                   {{-- <h3>Subject: {{ $sched->Subject->subject_name }} </h3> --}}
                              </div>
                              {{-- <div class="col-md-6 d-flex justify-content-end" >
                                   <p class="text-muted">Created {{ $sched->created_at->format('d-M-Y') }}
                                         By {{ $sched->created_by }} | Updated {{ $sched->updated_at->format('d-M-Y') }} By {{ $sched->updated_by }}</p>
                                   
                              </div> --}}
                         </div>
               
               </div>
               <div class="card-body">
                    <div class="row">
                         
                         <div class="col-12">
                              <div class="table-responsive">
                                   <table class="table table-striped table-hover table-sm">
                                        <tbody>
                                             <tr>
                                                  <th>Class name</th>
                                                  {{-- <td class="code">{{ $st_class->Classtable->class_name }}</td> --}}
                                             </tr>
                                            
                             
                                        </tbody>
                                        
                                   </table>
                              </div>
                         </div>
                       </div>
               </div>
               <div class="card-footer">
                    <div class="d-flex justify-content-end">
                         <a href="/student_classes" class="btn btn-info mr-4">Back</a>
                         <a href="/student_classes/{{ $stu_class->id }}/edit" class="btn btn-primary">Go To Update</a>
                    </div>
               </div>
          </div>
        
    </div>
@endsection