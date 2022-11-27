@extends('layouts.main')
@section('title','Course')
@push('Header')
     Subject
@endpush
@push('sub_Header')
     subject
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
          <div>

               @include('courses.subjects.create')
          </div>
          <div>
               <table class="table rounded-3 table-hover table-striped shadow mt-2">
                    <thead>
                       <tr>
                           <th>No</th>
                           <th>Subject Name</th>
                           <th>Course</th>
                           <th>Score</th>
                           <th>Description</th>
                           {{-- <th>Created By</th> --}}
                           <th>Created Date</th>
                           <th>Actions</th>
                       </tr>
                    </thead>
                    <tbody>
                         @foreach ($sub as $s)
                         <tr>
                                 <td>{{$loop->iteration}} </td>
                                 
                                 <td>{{$s->subject_name}} </td>
                                 <td>{{$s->Course->course_name}} </td>
                                 <td>{{$s->credit}} </td>
                                 <td>{{$s->description}} </td>
                                 {{-- <td>{{$s->created_by}} </td> --}}
                                 <td>{{$s->created_at->format('d-M-Y')}} </td>
                                 <td>
                                   <form action="/subjects/delete/{{$s->id}}" method="post" class="d-flex justify-content-between">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                                        <a href="/subjects/{{$s->id}}/edit"  class="bi bi-folder-plus"></a> |
                                   
                                        <a href="/subjects/view/{{$s->id}}" class="bi bi-text-paragraph"></a>
                                   </form>

                                 </td>
                         </tr>
                         @endforeach
 
                                   
                    </tbody>
               </table>
          </div>
     </div>
@endsection