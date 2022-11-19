@extends('layouts.main')
@section('title','Class Student')
@push('Header')
     Assign student to a class
@endpush
@push('sub_Header')
     <a href="/assign_students">assign student</a> / index
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
               @include('assign_students.create')
          </div>
          <div>
               <div class="table-responsive">
                    <table class="table table-hover shadow mt-2">
                         <thead>
                              <tr>
                                   <th>ID</th>
                                   <th>Student Name</th>
                                   <th>Gender</th>
                                   <th>Phone</th>
                                   <th>Date of Birth</th>
                                   <th>Class ID</th>
                                   <th>Class Name</th>
                                   <th>Subject</th>
                                   <th style="width: 9%">Actions</th>
                              </tr>
                         </thead>
                         <tbody id="search_data">
                              @foreach ($assign as $ass)
                                   <tr>
                                        <td>
                                             {{ $ass->student_id }}
                                        </td>
                                        <td>
                                             {{ $ass->Student->first_name }} {{ $ass->Student->last_name }}
                                        </td>
                                        <td>
                                             {{ $ass->Student->gender }}
                                        </td>
                                        <td>
                                             {{ $ass->Student->phone }}
                                        </td>
                                        <td>
                                             {{ $ass->Student->dob }}
                                        </td>
                                        <td>
                                             {{ $ass->classtable_id }}
                                        </td>
                                        <td>
                                             {{ $ass->Classtable->class_name }}
                                        </td>
                                        <td>
                                             {{ $ass->Classtable->Schedule->Subject->subject_name }}
                                        </td>
                                        <td>
                                             <form action="/assign_students/{{$ass->student_id}}" method="post" class="d-flex justify-content-between">
                                                  @csrf
                                                  @method('DELETE')
                                                  <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                                                  <a href="/assign_students/{{$ass->student_id}}/edit"  class="bi bi-folder-plus"></a> | 
                                                  {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="" --}}
                                                  <a href="/assign_students/{{$ass->student_id}}" class="bi bi-text-paragraph"></a>
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