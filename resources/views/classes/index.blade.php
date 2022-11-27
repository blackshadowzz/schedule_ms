@extends('layouts.main')
@section('title','Class')
@push('Header')
     Class
@endpush
@push('sub_Header')
     <a href="/classes">class</a> / index
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
               @include('classes.create')
          </div>
          
          <div class="table-responsive">
               <table class="table table-hover shadow mt-2">
                    <thead>
                         <tr>
                              <th>No</th>
                              <th>Class name</th>
                              <th>Description</th>
                              <th>Created By</th>
                              <th>Created Date</th>
                              <th style="width: 10%">Actions</th>
                         </tr>
                    </thead>
                    <tbody>
                         @foreach ($class as $c)
                              <tr>
                                   <td>{{ $c->id }}</td>
                                   <td>{{ $c->class_name }}</td>
                                   <td>{{ $c->description }}</td>
                                   <td>{{ $c->created_by }}</td>
                                   <td>{{ $c->created_at }}</td>
                                   <td>
                                        <form action="/classes/{{$c->id}}" method="post" class="d-flex justify-content-between">
                                             @csrf
                                             @method('DELETE')
                                             <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                                             <a href="/classes/{{$c->id}}/edit"  class="bi bi-folder-plus"></a> | 
                                             {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="" --}}
                                             <a href="/classes/{{$c->id}}" class="bi bi-text-paragraph"></a>
                                        </form>
                                   </td>
                              </tr>
                         @endforeach
                    </tbody>
               </table>
          </div>
     </div>
@endsection