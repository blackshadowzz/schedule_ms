@extends('layouts.main')
@section('title','Time')
@push('Header')
     Semester
@endpush
@push('sub_Header')
     <a href="/semesters">semester</a> / index
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
               @include('semesters.create')
          </div>

          <div>
               <div class="table-responsive">
                    <table class="table table-striped shadow table-hover mt-3">
                         <thead>
                              <tr>
                                   <th>No</th>
                                   <th>Semester</th>
                                   <th>Description</th>
                                   <th>Created By</th>
                                   <th>Created Date</th>
                                   <th class="" style="width: 7%">Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                             @foreach ($sem as $s)
                                  <tr>
                                   <td>{{ $s->id }}</td>
                                   <td>{{ $s->semester_name }}</td>
                                   <td>{{ $s->description }}</td>
                                   <td>{{ $s->created_by }}</td>
                                   <td>{{ $s->created_at }}</td>
                                   <td>
                                        <form action="/semesters/{{$s->id}}" method="post" class="d-flex justify-content-between">
                                                  @csrf
                                                  @method('DELETE')
                                                  <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                                                  <a href="/semesters/{{$s->id}}/edit"  class="bi bi-folder-plus"></a> 
                                                  {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="" --}}
                                                  {{-- <a href="/semesters/{{$s->id}}" class="bi bi-text-paragraph"></a> --}}
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