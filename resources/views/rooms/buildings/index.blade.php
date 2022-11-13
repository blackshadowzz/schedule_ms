@extends('layouts.main')
@section('title','Building')
@push('Header')
     Building
@endpush
@push('sub_Header')
     building
@endpush
@section('content')
     <div class="">
          <div class="">
               @if(Session::has('message'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               @endif
          </div>
          <div class="">
               @include('rooms.buildings.create')
          </div>

          <div class="mt-3">
               <table class="table table-striped table-hover shadow">
                    <thead>
                         <tr>
                              <th>No</th>
                              <th>Building</th>
                              <th>Description</th>
                              <th>Created At</th>
                              <th>Activity</th>
                         </tr>
                    </thead>
                    @foreach ($building as $build )
                         <tr>
                              <td>{{ $build->id }}</td>
                              <td>{{ $build->building_name }}</td>
                              <td>{{ $build->description }}</td>
                              <td>{{ $build->created_at }}</td>
                              <td>
                                   <form action="/buildings/{{$build->id}}" method="post" class="d-flex justify-content-between">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                                        <a href="/buildings/{{$build->id}}/edit"  class="bi bi-folder-plus"></a> |
                                        {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="" --}}
                                        <a href="/buildings/{{$build->id}}" class="bi bi-text-paragraph"></a>
                                   </form>
                              </td>
                         </tr>
                    @endforeach
               </table>
          </div>
     </div>

@endsection