@extends('layouts.main')
@section('title','Dashboard')
@push('Header')
     <h5>Dashboard</h5>
@endpush
@push('sub_Header')
     dashboard
@endpush
@section('content')

    <div class="">
        <div class="row">
            <div class="col-md-3">
                <div class="box-1 shadow bg-primary ">
                    <div class="box-title row align-items-start text-white ">
                        <div class="col-sm-6">Student</div>
                        <div class="title-icon col-sm-6 text-right">
                                <i class="bi bi-people-fill"></i>
                        </div>

                    </div>
                    <div class="box-body row align-items-end text-white">
                        <div class="box-body-total col-md-6">TOTAL</div>
                        <div class="col-sm-6 text-right">{{ $stu_count }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                 <div class="box-1 shadow bg-success ">
                      <div class="box-title row align-items-start text-white ">
                           <div class="col-sm-6">Teacher</div>
                           <div class="title-icon col-sm-6 text-right">
                                <i class="bi bi-person-video3"></i>
                           </div>
  
                      </div>
                      <div class="box-body row align-items-end text-white">
                           <div class="box-body-total col-md-6">TOTAL</div>
                           <div class="col-md-6 text-right">{{ $teach_count }}</div>
                      </div>
                 </div>
            </div>
            <div class="col-md-3">
                 <div class="box-1 shadow bg-info ">
                      <div class="box-title row align-items-start text-white ">
                           <div class="col-sm-6">Subject</div>
                           <div class="title-icon col-sm-6 text-right">
                                <i class="bi bi-journals ml-2"></i>
                           </div>
  
                      </div>
                      <div class="box-body row align-items-end text-white">
                           <div class="box-body-total col-md-6">TOTAL</div>
                           <div class="col-md-6 text-right">{{ $sub }}</div>
                      </div>
                 </div>
            </div>
            <div class="col-md-3">
                 <div class="box-1 shadow bg-danger ">
                      <div class="box-title row align-items-start text-white ">
                           <div class="col-sm-6">Class</div>
                           <div class="title-icon col-sm-6 text-right">
                                <i class="bi bi-calendar3"></i>
                           </div>
  
                      </div>
                      <div class="box-body row align-items-end text-white">
                           <div class="box-body-total col-md-6">TOTAL</div>
                           <div class="col-sm-6 text-right">{{ $class }}</div>
                      </div>
                 </div>
            </div>
          </div>
          <div class="">
               {{-- <div class="content-header">
                    <div class="row">
                         <div class="col-md-6">
                             
                             
                             
                         </div>
                         <div class="col-md-6">
                             
                             
                    
                         </div>
                         
                         
                    </div>
                   
               </div> --}}
               <div class="row mt-3">
                    <div class="col-md-6">
                         <div class="row">
                              <div class="col-6">
                                   <h5 class="">Student Class</h5>
                              </div>
                              <div class="col-6">
                                   <span class="text-danger float-sm-right">Last 5 Created</span>
                              </div>
                         </div>
                         <table class="table table-hover shadow">
                              <tr>
                                   <th>
                                        Fullname
                                   </th>
                                   <th>
                                        Gender
                                   </th>
                                   <th>
                                        Date-Birth
                                   </th>
                                   <th>
                                        Class Name
                                   </th>
                                   <th>
                                        Created
                                   </th>
                              </tr>
                              @foreach ($assign as $ass)
                                   <tr>
                                        <td>{{ $ass->Student->first_name }} {{ $ass->Student->last_name }}</td>
                                        <td>{{ $ass->Student->gender }}</td>
                                        <td>{{ $ass->Student->dob }}</td>
                                        <td>
                                             {{ $ass->Classtable->class_name }} 
                                        </td>
                                        <td>
                                             {{ $ass->created_at->format('D-d-M-Y') }}  
                                             <span class="right badge badge-danger float-center">New</span> 
                                             <a href="/student_classes" class="bi bi-text-paragraph float-md-right"></a>
                                        </td>
                                   </tr>
                              @endforeach
                         </table>
                    </div>
                    <div class="col-md-6">
                         <div class="row">
                              <div class="col-6">
                                   <h5>Teacher</h5>
                              </div>
                              <div class="col-6">
                                   <span class="text-danger float-sm-right">Last 5 Created</span>
                              </div>
                         </div>
                         <table class="table table-hover shadow">
                              <tr>
                                   <th>
                                        Fullname
                                   </th>
                                   <th>
                                        Gender
                                   </th>
                                   <th>
                                        Phone
                                   </th>
                                   <th>
                                        Position
                                   </th>
                                   <th>
                                        Created
                                   </th>
                              </tr>
                              @foreach ($teach as $t)
                                   <tr>
                                        <td>{{ $t->first_name }} {{ $t->last_name }}
                                        <td>{{ $t->gender }}</td>
                                        <td>{{ $t->phone }}</td>
                                        <td>{{ $t->Position->position_name }}</td>
                                        <td>
                                             {{ $t->created_at->format('D-d-M-Y') }}  
                                             <span class="right badge badge-danger float-center">New</span> 
                                             <a href="/teachers" class="bi bi-text-paragraph float-md-right"></a>
                                        </td>
                                   </tr>
                              @endforeach
                         </table>
                    </div>
               </div>
          </div>
          
    </div>
@endsection
