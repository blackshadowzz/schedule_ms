@extends('layouts.main')
@section('title','Time')
@push('Header')
     Time
@endpush
@push('sub_Header')
     <a href="/times">time</a> / index
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
               @include('times.create')
          </div>

          <div>
               <div class="table-responsive">
                    <table class="table table-striped shadow table-hover mt-3">
                         <thead>
                              <tr>
                                   <th>No</th>
                                   <th>Times</th>
                                   <th>Days</th>
                                   <th>Start Date</th>
                                   <th>End Date</th>
                                   <th class="" style="width: 7%">Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach ($time as $t)
                                   <tr>
                                        <td>{{ $t->id }}</td>
                                        <td>{{ $t->times }}</td>
                                        <td>
                                            {{ $t->days }}
                                        </td>
                                        <td>{{ $t->start_date }}</td>
                                        <td>{{ $t->end_date }}</td>
                                        <td>
                                             <form action="/times/{{$t->id}}" method="post" class="d-flex justify-content-between">
                                                  @csrf
                                                  @method('DELETE')
                                                  <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                                                  <a href="/times/{{$t->id}}/edit"  class="bi bi-folder-plus"></a> 
                                                  {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="" --}}
                                                  {{-- <a href="/times/{{$t->id}}" class="bi bi-text-paragraph"></a> --}}
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