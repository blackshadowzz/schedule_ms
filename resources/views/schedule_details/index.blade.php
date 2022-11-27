@extends('layouts.main')
@section('title','Schedule Details')
@push('Header')
     Schedule Detail
@endpush
@push('sub_Header')
     <a href="/schedule_details">schedule</a> / index
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
               @include('schedule_details.create')
          </div>
          <div>
               <div class="table-responsive">
                    <table class="table sm table-hover shadow mt-2">
                         <thead>
                              <tr>
                                   <th>Class</th>
                                   <th>Subject</th>
                                   <th>Room</th>
                                   <th>Teacher</th>
                                   <th>Semester</th>
                                   <th>Time</th>
                                   <th>Day</th>
                                   <th>Start</th>
                                   <th>End</th>
                                   <th style="width: 9%">Actions</th>

                              </tr>
                         </thead>
                         <tbody>
                              @foreach ($sched as $s)
                                   <tr>
                                        <td>{{ $s->Classtable->class_name }}</td>
                                        <td>{{ $s->Subject->subject_name }}</td>
                                        <td>{{ $s->Room->room_name }}</td>
                                        <td>{{ $s->Teacher->first_name }} {{ $s->Teacher->last_name }}</td>
                                        <td>{{ $s->Semester->semester_name }}</td>
                                        <td>{{ $s->time }}</td>
                                        <td>{{ $s->day }}</td>
                                        <td>{{ $s->start_date }} </td>
                                        <td>{{ $s->end_date }}</td>
                                        <td>
                                             <form action="/schedules/{{$s->id}}" method="post" class="d-flex justify-content-between">
                                                  @csrf
                                                  @method('DELETE')
                                                  <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                                                  <a href="/schedules/{{$s->id}}/edit"  class="bi bi-folder-plus"></a> | 
                                                  {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="" --}}
                                                  <a href="/schedules/{{$s->id}}" class="bi bi-text-paragraph"></a>
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