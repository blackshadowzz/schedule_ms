@extends('layouts.main')
@section('title','Room')
@push('Header')
     Room
@endpush
@push('sub_Header')
     room
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

               @include('rooms.create')
          </div>
          <div class="mt-3">
               <table class="table table-hover table-striped shadow">
                    <thead>
                         <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Floor</th>
                              <th>Building</th>
                              <th>Description</th>
                              <th>Created By</th>
                              <th>Activity</th>
                         </tr>
                    </thead>
                    @foreach ($room as $r)
                         <tr>
                              <td>{{ $r->id }}</td>
                              <td>{{ $r->room_name }}</td>
                              <td>{{ $r->floor }}</td>
                              <td>{{ $r->Building->building_name }}</td>
                              <td>{{ $r->description }}</td>
                              <td>{{ $r->created_by }}</td>
                              <td>
                                   <form action="/rooms/{{$r->id}}" method="post" class="d-flex justify-content-between">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                                        <a href="/rooms/{{$r->id}}/edit"  class="bi bi-folder-plus"></a> |
                                        {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="" --}}
                                        <a href="/rooms/{{$r->id}}" class="bi bi-text-paragraph"></a>
                                   </form>
                              </td>
                         </tr>
                    @endforeach
               </table>
          </div>
     </div>
@endsection