@extends('layouts.main')
@section('title','Position')
@push('Header')
     Position
@endpush
@push('sub_Header')
     position
@endpush
@section('content')
     <div>

          <div>
               <table class="table table-bordered table-striped shadow mt-2 table-hover">
                    <thead>
                         <tr>
                              <th>ID</th>
                              <th>Position</th>
                              <th>Department</th>
                              <th>Description</th>
                              <th>Created By</th>
                              <th>Created At</th>
                              <th>Actions</th>
                         </tr>
                    </thead>
                    @foreach ($pos as $p )
                         <tr>
                              <td>{{ $p->id }}</td>
                              <td>{{ $p->position_name }}</td>
                              <td>{{ $p->Department->department_name }}</td>
                              <td>{{ $p->description }}</td>
                              <td>{{ $p->created_by }}</td>
                              <td>{{ $p->created_at }}</td>
                              <td>
                                   
                              </td>
                         </tr>
                    @endforeach
               </table>
          </div>
     </div>
@endsection