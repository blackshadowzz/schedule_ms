@extends('layouts.main')
@section('title','Student')
@push('Header')
     Student
@endpush
@push('sub_Header')
     student
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
               @include('students.create')
          </div>
          <div>
               <table class="table table-sm table-bordered table-hover shadow mt-2">
                    <thead>
                         <tr>
                              <th>No</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Date of Birth</th>
                              <th>Gender</th>
                              <th>Phone</th>
                              <th>Email</th>
                              <th>Address</th>
                              <th>Created By</th>
                              <th>Created Date</th>
                              <th>Actions</th>
                         </tr>
                    </thead>
                    @foreach ($stu as $st)
                         <tr>
                              <td>{{ $st->id }}</td>
                              <td>{{ $st->first_name }}</td>
                              <td>{{ $st->last_name }}</td>
                              <td>{{ $st->dob }}</td>
                              <td>{{ $st->gender }}</td>
                              <td>{{ $st->phone }}</td>
                              <td>{{ $st->email }}</td>
                              <td>{{ $st->address }}</td>
                              <td>{{ $st->created_by }}</td>
                              <td>{{ $st->created_at->format('d-M-Y') }}</td>
                              <td>
                                   <form action="/students/{{$st->id}}" method="post" class="d-flex justify-content-between">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                                        <a href="/students/{{$st->id}}/edit"  class="bi bi-folder-plus"></a> |
                                        {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="" --}}
                                        <a href="/students/{{$st->id}}" class="bi bi-text-paragraph"></a>
                                   </form>
                              </td>
                         </tr>
                    @endforeach
               </table>
               <div class="d-flex justify-content-center">
                    {{ $stu->links('pagination::bootstrap-4') }} 
               </div>
          </div>
     </div>
@endsection