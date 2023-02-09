@extends('main_template')
@section('content')
   

<!-- <div class="row">
    <div class="col-sm-6 mb-3">
        <h4 class="fw-bold  "> <span class="text-muted fw-light"> {{$title}} </span> </h4>
    </div>
     <div class="col-sm-6 mb-3" style="text-align:right">
         <a href="{{url('SuperAdmin/addFleet')}}" class="btn btn-primary text-nowrap">
      <i class="bx bx-car"></i> Add Fleet
    </a>
    </div>
</div> -->

<?php 

// echo '<pre>';
// print_r($allFleets);
// echo '</pre>';
?>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <div class="card-title mb-0">
                  <h5 class="mb-0">{{$title}}</h5>  
                </div>         
            </div>
            <div class="col-md-6">
              <div class="text-end">
                    <a href="{{url('SuperAdmin/addFleet')}}" class="btn btn-primary">Add Fleet</a>
                </div>   
            </div>
        </div>
        
    </div>
    <hr class="mt-0 mb-1" />
  <div class="card-datatable table-responsive">

    @if(Session::has('msg'))
    <div class="row">
        <div class="col-md-12">
            <p class="error" >{{ Session::get('msg') }}</p>
        </div>
    </div>
    @endif
    
   <table id="example" class="table table-striped">
        <thead>
            <tr>  
                <th>S.N.</th>           
                <th>Cab Id</th>                                            
                <th>Fuel Type</th>      
                <th>Model </th>
                <th>Reg No</th>
                <th>Chassis No</th>                      
                <th>Device Type</th> 
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allFleets as $key => $fleet)
            <tr>    
                <td>{{ $key+1 }}</td>
                <td>{{ $fleet->cab_name }}</td>
                <td> 
                 @if ($fleet->fuel_type == 1)
                    Petrol
                    @else
                    Diesel
                    @endif
                </td>    
                <td>{{ $fleet->model_id }}</td>
                <td>{{ $fleet->reg_no }}</td>
                <td>{{ $fleet->chassis_no }}</td>
                <td>
                    @if($fleet->device_type == '' || $fleet->device_type == NULL)
                    N/A
                    @elseif($fleet->device_type == 1)
                    Infotrack Telematics
                    @else
                    Arya Omnitalk
                    @endif
                </td>
                
                <td>
                    <div class="d-inline-block border-0 action-btn">
                        <a href="javascript:;" class="dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"> <i class="menu-icon tf-icons bx bx-dots-vertical-rounded" ></i> </a>
                        <ul class="dropdown-menu dropdown-menu-end" style="">
                            <li><a href="javascript:;" class="dropdown-item">Edit</a></li>
                            <li><a href="javascript:;" class="dropdown-item">View</a></li>
                            <li><a href="{{url('SuperAdmin/assignFleet/'.$fleet->fleet_id)}}" class="dropdown-item">Assign</a></li>
                            <li><a href="javascript:;" class="dropdown-item">Add/Edit Divice ID</a></li>
                            
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>



  </div>
</div>

 @endsection