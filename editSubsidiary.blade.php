@extends('main_template')
@section('content')  


<div class="card mb-4">
  <div class="card-header">
    <div class="card-title mb-0">
      <h5 class="mb-0">{{$title}}</h5>
    </div>
  </div>
  <hr class="m-0" />
 <div class="card-body">
   <form class="form-horizontal" action="{{url('SuperAdmin/updateSubsidiaryDetails')}}" method="post" id="EditSubsidaryForm">
   <div class="row">

      <div class="col-md-4 mt-2">

           <div class="form-group">
             <label class="form-label" for="basic-default-fullname">Company Name</label>
              <select class="form-control" id="company_id" name="company_id">
                <option value="{{$companyData->company_id}}">Company</option>
                <?php foreach($companyDatas as $userVal){ ?>
                  <option value="{{$userVal->company_id}}" <?php if($companyData->company_id == $userVal->company_id){ echo 'selected'; } ?>>{{$userVal->comp_name}}</option>
               
                <?php }?>
               
              </select>
            </div>
            </div>


   	<div class="col-md-4 mt-2">
   		 <label class="form-label" for="basic-default-fullname">Subsidiary Name</label>
            <input type="text" class="form-control" id="subsidiary_name" name="subsidiary_name" value=" {{$companyData->subsidiary_name}}" >
             <p class="error" id="err_subsidiary_name"></p>

   	</div>
    <div class="col-md-4 mt-2">
 	    <div class="form-group">
                          <label class="form-label" for="exampleInputUsername1">Status</label>
                          <select class="form-control" name="subs_status" id="subs_status" value="{{$companyData->subs_status}}">
                            <option value="1"> Active</option>
                            <option value="0"> Inactive</option>
                          </select>
                        </div>
                      </div>
                 <p class="error" id="err_subs_status"></p>

</div>
    
    <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token" />
          <input type="hidden" value="{{$companyData->subsidiary_id}}" name="subsidiary_id" />
   <div class="text-end">
       <button type="button" class="btn btn-primary" onclick="EditSubsidiary()">Update</button> 
      </div>
        </form>
      </div>
  </div>







     
 @endsection