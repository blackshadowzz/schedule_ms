@extends('layouts.main')
@section('title','Teacher')
@push('Header')
     Teacher
@endpush
@push('sub_Header')
     teacher
@endpush
@section('content')
     <div>
          {{-- part create, search ... --}}
          <div>
               <div class="">
                    @if(Session::has('message'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                         {{Session::get('message')}}
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
               </div>
               @include('teachers.create')

          </div>
          {{-- part view list teacher data --}}
          <div class="">
               <div class="table-responsive">
                    <table class="table table-avatar table-sm table-striped table-hover shadow mt-2">
                         <thead>
                              <tr>
                                   <th>ID</th>
                                   <th>First Name</th>
                                   <th>Last Name</th>
                                   <th>Gender</th>
                                   <th>Date of Birth</th>
                                   <th>Phone</th>
                                   <th>Email</th>
                                   <th>Address</th>
                                   <th>Position</th>
                                   <th>Created By</th>
                                   <th>Created At</th>
                                   <th>Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach($teach as $t)
                              <tr>
                                   <td>{{ $t->id }}</td>
                                   <td>{{ $t->first_name }}</td>
                                   <td>{{ $t->last_name }}</td>
                                   <td>{{ $t->gender }}</td>
                                   <td>{{ $t->dob }}</td>
                                   <td>{{ $t->phone }}</td>
                                   <td>{{ $t->email }}</td>
                                   <td>{{ $t->address }}</td>
                                   <td>{{ $t->Position->position_name }}</td>
                                   <td>{{ $t->created_by }}</td>
                                   <td>{{ $t->created_at->format('d-M-Y') }}</td>
                                   <td>
                                        <form action="/teachers/{{$t->id}}" method="post" class="d-flex justify-content-between">
                                             @csrf
                                             @method('DELETE')
                                             <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                                             <a href="/teachers/{{$t->id}}/edit"  class="bi bi-folder-plus"></a> |
                                             {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="" --}}
                                             <a href="/teachers/{{$t->id}}" class="bi bi-text-paragraph"></a>
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