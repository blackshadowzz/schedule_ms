@extends('layouts.main')
@section('title','Schedule')
@push('Header')
     Schedule
@endpush
@push('sub_Header')
     <a href="/schedules">schedule</a> / index
@endpush
@section('content')
     <div>
          <div class="">
               @if(Session::has('message'))
               <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{Session::get('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               @endif
          </div>
          <div class="">
               @if(Session::has('message_danger'))
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{Session::get('message_danger')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               @endif
          </div>
          <div>
               @include('schedules.create')
          </div>

          <div>
               <div class="table-responsive">
                    <table class="table shadow rounded-3 table-hover mt-3">
                         <thead>
                              <tr>
                                   <th>Schedule</th>
                                   <th>Subject</th>
                                   <th>Semester</th>
                                   <th>Time</th>
                                   <th>Days</th>
                                   <th>Start</th>
                                   <th>End</th>
                                   
                                   <th class="" style="width: 7%">Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                             @foreach ($sched as $s)
                                  <tr>
                                   <td>{{ $s->schedule_name }}</td>
                                   <td>{{ $s->Subject->subject_name }}</td>
                                   <td>{{ $s->Semester->semester_name }}</td>
                                   <td>{{ $s->Time->times }}</td>
                                   <td>{{ $s->Time->days }}</td>
                                   <td>{{ $s->start_hour }}</td>
                                   <td>{{ $s->end_hour }}</td>
                                   <td>
                                        <form action="/schedules/delete/{{$s->id}}" method="post" class="d-flex justify-content-between">
                                             @csrf
                                             @method('DELETE')
                                             <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                                             <a href="/schedules/{{$s->id}}/edit"  class="bi bi-folder-plus"></a> 
                                             {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="" --}}
                                             <a href="/schedules/view/{{$s->id}}" class="bi bi-text-paragraph"></a>
                                        </form>
                                   </td>
                                  </tr>
                             @endforeach
                             
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
@endsection