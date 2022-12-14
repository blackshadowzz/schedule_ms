@extends('layouts.main')
@section('title','Course')
@push('Header')
     Course
@endpush
@push('sub_Header')
     course
@endpush
@section('content')
     <div>
          <div class="">
               @if(Session::has('message'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               @endif
          </div>
          <div>

               @include('courses.create')
          </div>
          <div>
               <table class="table rounded-3 table-hover table-striped shadow mt-2">
                    <thead>
                       <tr>
                           <th>No</th>
                           <th>Course Name</th>
                           <th>Description</th>
                           <th>Created By</th>
                           <th>Created Date</th>
                           <th>Actions</th>
                       </tr>
                    </thead>
                    <tbody>
                         @foreach($course as $c)
                        <tr>
                              <td>{{$c->id}}</td>
                              <td>{{$c->course_name}}</td>
                              <td>{{$c->description}}</td>
                              <td>{{$c->created_by}}</td>
                              <td>{{$c->created_at->format('d-M-Y')}}</td>
                              <td>
                                   <form action="/courses/{{$c->id}}" method="post" class="d-flex justify-content-between">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                                        <a href="/courses/{{$c->id}}/edit"  class="bi bi-folder-plus"></a> |
                                        {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="" --}}
                                        <a href="/courses/{{$c->id}}" class="bi bi-text-paragraph"></a>
                                   </form>
                              </td>
                         </tr>
                         @endforeach
                    </tbody>
               </table>
          </div>
     </div>
@endsection