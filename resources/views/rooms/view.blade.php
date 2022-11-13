@extends('layouts.main')
@section('title','View Teacher')
@push('Header')
     View room
@endpush
@push('sub_Header')
     room / view
@endpush
@section('content')
     
    <div class="container">
          <div class="card">
               <div class="card-header">

                         {{-- <div class="row">
                              <div class="col-md-6">
                                   <h3>Hello {{ $teach->first_name }} {{ $teach->last_name }}</h3>
                              </div>
                              <div class="col-md-6 d-flex justify-content-end" >
                                   <p class="text-muted">Created {{ $teach->created_at->format('d-M-Y') }}
                                         By {{ $teach->created_by }} | Updated {{ $teach->updated_at->format('d-M-Y') }} By {{ $teach->updated_by }}</p>
                                   
                              </div>
                         </div> --}}
                         <div>
                              <div class="d-flex justify-content-end" >
                                   <p class="text-muted">Created {{ $room->created_at->format('d-M-Y') }}
                                         By {{ $room->created_by }} | Updated {{ $room->updated_at->format('d-M-Y') }} By {{ $room->updated_by }}</p>
                                   
                              </div>
                         </div>
               
               </div>
               <div class="card-body">
                    <div class="row">
                    
                         <div class="col-12">
                              <div class="table-responsive">
                                   <table class="table table-striped table-hover">
                                        <tbody>
                                             <tr>
                                                  <th>ID</th>
                                                  <td class="code">{{ $room->id }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Room Name</th>
                                                  <td class="code">{{ $room->room_name }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Floor</th>
                                                  <td class="code">{{ $room->floor }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Building</th>
                                                  <td>{{ $room->Building->building_name}}</td>
                                             </tr>
                                             <tr>
                                                  <th>Description</th>
                                                  <td>{{ $room->description }}</td>
                                             </tr>
                                           
                                             
                                        </tbody>
                                        
                                   </table>
                              </div>
                         </div>
                       </div>
               </div>
               <div class="card-footer">
                    <div class="d-flex justify-content-end">
                         <a href="/courses" class="btn btn-info mr-4">Back</a>
                         <a href="/courses/{{ $room->id }}/edit" class="btn btn-primary">Go To Update</a>
                    </div>
               </div>
          </div>
        
    </div>
@endsection