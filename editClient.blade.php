@extends('main_template') @section('content') 
<!-- <h4 class="fw-bold py-3 mb-4"> {{$title}}</h4> -->
<div class="card">
  <div class="card-header">
    <div class="card-ttile mb-0">
      <h5 class="mb-0">{{$title}}</h5>
    </div>
  </div>
  <hr class="my-0" />
  <div class="card-body">
<form action="{{url('SuperAdmin/updatecustomersDetails')}}" method="post" id="EditCustomerForm" enctype="multipart/form-data" data-select2-id="saveCustomerDataFrm">
   <input type="hidden" name="_token" value="zYz3WERnhKRj9bIJs3u2SIm9qTo0lpKnq8J8URQM">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    

   <fieldset data-select2-id="10">
      <div class="row">
         <div class="col-md-4 mt-2">
            <div class="form-group">
               <label for="firstName1">Organization</label>
               <input type="text" placeholder="Organization Name" class="form-control" name="organization_name"  id="organization_name" value="{{$customer_list->organization_name}}">
             <p class="error" id="err_organization_name"></p>

            </div>
         </div>
         <div class="col-md-4 mt-2">
            <div class="form-group">
               <label for="lastName1">Department Name</label>
               <input type="text" placeholder="Customer Name" class="form-control"  id="department_name" name="department_name" value=" {{$customer_list->department_name}}">
                           <p class="error" id="err_department_name"></p>

            </div>
         </div>
         <div class="col-md-4 mt-2 mt-2">
            <div class="form-group">
               <label for="country">States</label>
               <select name="state_id"class="form-control" id="state_id"onchange="selectCity(this);">
                  <option value="">Select States</option>
                  <?php foreach($states as $stateVal){ ?>
                  <option value="{{$stateVal->state_id}}" <?php if($customer_list->state_id == $stateVal->state_id){ echo 'selected'; } ?>>{{$stateVal->state_name}}</option>
                <?php } ?>
                 
               </select>

            </div>
         </div>
      </div>
    
      <div class="row" >
         

         <div class="col-md-4 mt-2">
            <div class="form-group">
               <label for="city">City</label>
               <select name="city_id" class="form-control" id="city">
               	    @foreach ($city as $citys) 
                      <option value="{{$citys->city_id}}" <?php if($customer_list->city_id == $citys->city_id){ echo 'selected'; } ?>>{{$citys->city_name}}</option>
                    @endforeach
               </select>
     
            </div>
         </div>
         <div class="col-md-4 mt-2">
            <div class="form-group">
               <label for="phoneNumber1">Address </label>
               <input type="text"  placeholder="Address" class="form-control" id="address" name="address" value="{{$customer_list->address}}">
                                       <p class="error" id="err_address"></p>

            </div>
         </div>
         <div class="col-md-4 mt-2" data-select2-id="52">
            <div class="form-group" data-select2-id="51">
               <label for="phoneNumber1">Organization Type </label>
               <select onchange="getOrgType(this.value);" id="org_type" name="org_type" class="select2 form-control select2-hidden-accessible" data-select2-id="org_type" tabindex="-1" aria-hidden="true">
                  <option value="" data-select2-id="6">Select Organization Type</option>
                  <option value="1" data-select2-id="53">Central Government</option>
                  <option value="2" data-select2-id="54" selected="selected">State Government</option>
                  <option value="3" data-select2-id="55">Corporate</option>
               </select>
               <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="5" style="width: 483.65px;">
               <span class="selection">
               <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-org_type-container">
               
               <span class="select2-selection__arrow" role="presentation">
               <b role="presentation"></b>
               </span>
               </span>
               </span>
               <span class="dropdown-wrapper" aria-hidden="true"></span>
               </span>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mt-2">
            <div class="form-group">
               <label for="proposalTitle1">PAN No </label>
               <input type="text" placeholder="PAN No" class="form-control" id="pan_no" name="pan_no" value="{{$customer_list->pan_no}}">
                            <p class="error" id="err_pan_no"></p>

            </div>
         </div>
         <div class="col-md-4 mt-2">
            <div class="form-group">
               <label for="emailAddress2">GST No </label>
               <input type="text" placeholder="GST No" class="form-control" name="gst_no" id="gst_no"  value=" {{$customer_list->gst_no}}">
                                     <p class="error" id="err_gst_no"></p>

            </div>
         </div>
         <div class="col-md-4 mt-2">
            <div class="form-group">
               <label for="jobTitle1">Tender From </label>
               <input type="date" class="form-control datepicker hasDatepicker" id="tender_from" name="tender_from" placeholder="Select date" value="{{ \Carbon\Carbon::parse($customer_list->tender_from)->format('Y-m-d') }}">
                                                <p class="error" id="err_tender_from"></p>
    
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mt-2">
            <div class="form-group">
               <label for="shortDescription1">Tender To </label>
               <input type="date" name="tender_to" id="tender_to" rows="4" class="form-control datepicker hasDatepicker" placeholder="Select date" value="{{ \Carbon\Carbon::parse($customer_list->tender_to)->format('Y-m-d') }}" >
                      <p class="error" id="err_tender_to"></p>
      
            </div>
         </div>
         <div class="col-md-4 mt-2">
            <div class="form-group">
               <label for="videoUrl1">No Of Cabs </label>
               <input type="text" placeholder="No Of Cabs" class="form-control" id="no_of_cabs" name="no_of_cabs" value=" {{$customer_list->no_of_cabs}}">
                                     <p class="error" id="err_no_of_cabs"></p>

            </div>
         </div>
      
      </div>
      <div class="row">
      </div>
   </fieldset>
             <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
                       <input type="hidden" value="{{$customer_list->customer_id}}" name="customer_id" />


   <div class="form-actions text-end">
      
       <button type="button" class="btn btn-primary" onclick="EditClient()">Update</button> 
      
   </div>
</form>
</div></div>
<?php 
    $simple = 'simple string';

?>
<script>   
function selectCity(set){
  var state_id = set.value;
  var token = '{{csrf_token()}}';
  $.ajax({
      type: "POST",
   url: urls+"/Home/getCityInfo",  
       data: {
        state_id: state_id,
        _token: token 
      },
    dataType : 'html',
    success: function(result){
       var obj = jQuery.parseJSON(result);
       $("#city").html(obj.cities_list);
    }   
     
    });
}
</script>
@endsection