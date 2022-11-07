@extends('layouts.main')
@section('title','Dashboard')
@push('Header')
     <h5>Dashboard</h5>
@endpush
@push('sub_Header')
     dashboard
@endpush
@section('content')

    <div class="">
        <div class="row">
            <div class="col-md-3">
                <div class="box-1 shadow bg-primary ">
                    <div class="box-title row align-items-start text-white ">
                        <div class="col-sm-6">Employee</div>
                        <div class="title-icon col-sm-6 text-right">
                                <i class="bi bi-people-fill"></i>
                        </div>

                    </div>
                    <div class="box-body row align-items-end text-white">
                        <div class="box-body-total col-md-6">TOTAL</div>
                        <div class="col-sm-6 text-right"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                 <div class="box-1 shadow bg-success ">
                      <div class="box-title row align-items-start text-white ">
                           <div class="col-sm-6">Position</div>
                           <div class="title-icon col-sm-6 text-right">
                                <i class="bi bi-credit-card-fill"></i>
                           </div>
  
                      </div>
                      <div class="box-body row align-items-end text-white">
                           <div class="box-body-total col-md-6">TOTAL</div>
                           <div class="col-sm-6 text-right"></div>
                      </div>
                 </div>
            </div>
            <div class="col-md-3">
                 <div class="box-1 shadow bg-info ">
                      <div class="box-title row align-items-start text-white ">
                           <div class="col-sm-6">Department</div>
                           <div class="title-icon col-sm-6 text-right">
                                <i class="bi bi-diagram-3-fill"></i>
                           </div>
  
                      </div>
                      <div class="box-body row align-items-end text-white">
                           <div class="box-body-total col-md-6">TOTAL</div>
                           <div class="col-sm-6 text-right"></div>
                      </div>
                 </div>
            </div>
            <div class="col-md-3">
                 <div class="box-1 shadow bg-danger ">
                      <div class="box-title row align-items-start text-white ">
                           <div class="col-sm-6">Department</div>
                           <div class="title-icon col-sm-6 text-right">
                                <i class="bi bi-diagram-3-fill"></i>
                           </div>
  
                      </div>
                      <div class="box-body row align-items-end text-white">
                           <div class="box-body-total col-md-6">TOTAL</div>
                           <div class="col-sm-6 text-right"></div>
                      </div>
                 </div>
            </div>
      
       </div>
    </div>
@endsection
