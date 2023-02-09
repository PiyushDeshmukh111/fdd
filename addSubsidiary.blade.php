@extends('main_template')
@section('content')
<div class="card mb-4">
  <div class="card-header">
     <div class="card-title mb-0">
        <h5 class="mb-0">Create Subsidary</h5>
     </div>
  </div>
  <hr class="m-0" />
<form class="card-body" action="{{url('SuperAdmin/saveSubsidary')}}" method="POST" id="SubsidaryForm"> 
   
   <div class="row g-3" style="margin-top: 0px;">
      <div class="col-md-4 mt-0">
         <label class="form-label" for="multicol-username">Company Name</label>
         <div class="form-group">
            <select class="form-control" id="company_id" name="company_id">
               <option value="">Company</option>
               <?php foreach($companyDatas as $userVal){ ?>
               <option value="{{$userVal->company_id }}">{{$userVal->comp_name}}</option>
               <?php }?>
            </select>
         </div>
      </div>
      <div class="col-md-4 mt-0">
         <label class="form-label" for="multicol-username">subsidiary name</label>
         <input type="text" class="form-control" id="subsidiary_name" name="subsidiary_name" required>       
         <p class="error" id="err_subsidiary_name"></p>
         <!--          <input type="hidden" value="3" name="company_id">
            -->         
      </div>
      <div class="col-md-4 mt-0">
         <label class="form-label" for="exampleInputUsername1">Status</label>
         <select class="form-control" name="subs_status" id="subs_status" >
            <option value="1"> Active</option>
            <option value="0"> Inactive</option>
         </select>
         <p class="error" id="err_subs_status"></p>
      </div>
      <div class="text-end">
         <button type="button" class="btn btn-primary" onclick="AddSubsidiary()">Save</button> 
         <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      </div>
    </div>
</form>
</div>
@endsection