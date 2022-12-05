@extends('layouts.main')
@section('title','Class Student')
@push('Header')
     Assign student to a class
@endpush
@push('sub_Header')
     <a href="/assign_students">student_class</a> / index
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
                                   {{-- <th>Class ID</th> --}}
                                   <th>Class Name</th>
                                   <th>Created Date</th>
                                   <th style="width: 9%">Actions</th>
                              </tr>
                         </thead>
                         <tbody id="search_data">
                              @foreach ($assign as $ass)
                                   <tr>
                                        <td>
                                             {{ $ass->id }}
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
                                        {{-- <td>
                                             {{ $ass->classtable_id }}
                                        </td> --}}
                                        <td>
                                             {{ $ass->Classtable->class_name }}
                                        </td>
                                        <td>
                                             {{ $ass->created_at->format('d-M-Y') }}
                                        </td>
                                        <td>
                                             <form action="/student_classes/{{$ass->id}}" method="post" class="d-flex justify-content-between">
                                                  @csrf
                                                  @method('DELETE')
                                                  <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> | 
                                                  <a href="/student_classes/{{$ass->id}}/edit"  class="bi bi-folder-plus"></a> 
                                                  {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever=""--}}
                                                  {{-- <a href="/assign_students/{{$ass->id}}" class="bi bi-text-paragraph"></a> --}}
                                             </form>
                                        </td>
                                   </tr>
                              @endforeach
                         </tbody>

                    </table>
               </div>
               <div class="d-flex justify-content-center">
                    {!! $assign->links("pagination::bootstrap-4") !!}
               </div>
          </div>
     </div>
@endsection