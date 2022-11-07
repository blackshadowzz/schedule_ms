@extends('layouts.main')
@section('title','Position')
@push('Header')
     Department
@endpush
@push('sub_Header')
     department
@endpush
@section('content')
     <div>
          
          <div>
               <table class="table table-bordered table-hover shadow mt-2">
                    <thead>
                       <tr>
                           <th>No</th>
                           <th>Department</th>
                           <th>Description</th>
                           <th>Created At</th>
                           <th>Actions</th>
                       </tr>
                    </thead>
                    @foreach ($dep as $dep)
                         <tr>
                              <td>{{ $dep->id }}</td>
                              <td>{{ $dep->department_name }}</td>
                              <td>{{ $dep->description }}</td>
                              <td>{{ $dep->created_at }}</td>
                              <td>
                              
                              </td>
                         </tr>
                    @endforeach
               </table>
          </div>
     </div>
@endsection