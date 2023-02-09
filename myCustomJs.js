var urls  = $('#base_urls').val();

jQuery(document).ready(function($) {

    jQuery('.flasMsg').fadeOut(7000);
    $(".onlyNumericKey").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                   jQuery('.onlynumeric').html('only numeric value are insert');    
                   return false;
        }else{
             jQuery('.onlynumeric').html('');    
        }
   });

 });


    $('#state').on('change', function() {
      var stateId = this.value;
      $.ajax({
            type: "POST",
            url: urls+"/Home/getCityInfo",
            data: {
             _token: $('#_token').val(),
             state_id: stateId
            },
            dataType:"html",
            success: function(msg){ 
                var obj = jQuery.parseJSON(msg);
                $("#city").html(obj.cities_list);
            }  
        });
    });

function setvalidation(strId,strT,strMsg){
   if(strT=='S'){
           jQuery('#'+strId).css('border','');
           jQuery('#err_'+strId).html('');
       }else if(strT=='F'){               
              jQuery('#'+strId).css('border','1px solid #F00');
              jQuery('#err_'+strId).html(strMsg);
      }
}

function AddCompany(){

    var submircheak = 0 ;

    var comp_name = jQuery('#comp_name').val();    
    if (comp_name==null || comp_name==""){             
        submircheak =1; 
        setvalidation('comp_name','F',"Please Enter Company Name");
    }else{           
         setvalidation('comp_name','S',''); 
    }
    
    var comp_contact_no = jQuery('#comp_contact_no').val();    
    if (comp_contact_no==null || comp_contact_no==""){             
        submircheak =1; 
        setvalidation('comp_contact_no','F',"Please Enter Contact Number");
     }else{           
         setvalidation('comp_contact_no','S',''); 
    }

    var comp_pan_no = jQuery('#comp_pan_no').val();    
    if (comp_pan_no==null || comp_pan_no==""){             
        submircheak =1; 
        setvalidation('comp_pan_no','F',"Please Enter Pan Number");
    }else{           
         setvalidation('comp_pan_no','S',''); 
    }

    var comp_gst_no = jQuery('#comp_gst_no').val();    
    if (comp_gst_no==null || comp_gst_no==""){             
        submircheak =1; 
        setvalidation('comp_gst_no','F',"Please Enter Gst Number");
    }else{           
         setvalidation('comp_gst_no','S',''); 
    }

    var comp_address = jQuery('#comp_address').val();    
    if (comp_address==null || comp_address==""){             
        submircheak =1; 
        setvalidation('comp_address','F',"Please Enter Company Address");
    }else{           
         setvalidation('comp_address','S',''); 
    }

    if(submircheak ==1){  
        return false;
    }else{
        $( "#AddForm" ).submit(); 
    }    
}


function EditCompany(){

    var submircheak = 0 ;

    var comp_name = jQuery('#comp_name').val();    
    if (comp_name==null || comp_name==""){             
        submircheak =1; 
        setvalidation('comp_name','F',"Please Enter Company Name");
    }else{           
         setvalidation('comp_name','S',''); 
    }
    
    var comp_contact_no = jQuery('#comp_contact_no').val();    
    if (comp_contact_no==null || comp_contact_no==""){             
        submircheak =1; 
        setvalidation('comp_contact_no','F',"Please Enter Contact Number");
     }else{           
         setvalidation('comp_contact_no','S',''); 
    }

    var comp_pan_no = jQuery('#comp_pan_no').val();    
    if (comp_pan_no==null || comp_pan_no==""){             
        submircheak =1; 
        setvalidation('comp_pan_no','F',"Please Enter Pan Number");
    }else{           
         setvalidation('comp_pan_no','S',''); 
    }

    var comp_gst_no = jQuery('#comp_gst_no').val();    
    if (comp_gst_no==null || comp_gst_no==""){             
        submircheak =1; 
        setvalidation('comp_gst_no','F',"Please Enter Gst Number");
    }else{           
         setvalidation('comp_gst_no','S',''); 
    }

    var comp_address = jQuery('#comp_address').val();    
    if (comp_address==null || comp_address==""){             
        submircheak =1; 
        setvalidation('comp_address','F',"Please Enter Company Address");
    }else{           
         setvalidation('comp_address','S',''); 
    }

   
    if(submircheak ==1){  
        return false;
    }else{
        $( "#updateCompanyForm" ).submit(); 
    }    
}


function AddSubsidiary(){

    var submircheak = 0 ;

    var subsidiary_name = jQuery('#subsidiary_name').val();    
    if (subsidiary_name==null || subsidiary_name==""){             
        submircheak =1; 
        setvalidation('subsidiary_name','F',"Please Enter subsidiary  Name");
    }else{           
         setvalidation('subsidiary_name','S',''); 
    }
    
    var subs_status = jQuery('#subs_status').val();    
    if (subs_status==null || subs_status==""){             
        submircheak =1; 
        setvalidation('subs_status','F',"Please Select Status");
     }else{           
         setvalidation('subs_status','S',''); 
    }

    if(submircheak ==1){  
        return false;
    }else{
        $( "#SubsidaryForm" ).submit(); 
    }    
}


function EditSubsidiary(){

    var submircheak = 0 ;

    var subsidiary_name = jQuery('#subsidiary_name').val();    
    if (subsidiary_name==null || subsidiary_name==""){             
        submircheak =1; 
        setvalidation('subsidiary_name','F',"Please Enter subsidiary  Name");
    }else{           
         setvalidation('subsidiary_name','S',''); 
    }
    
    var subs_status = jQuery('#subs_status').val();    
    if (subs_status==null || subs_status==""){             
        submircheak =1; 
        setvalidation('subs_status','F',"Please Select Status");
     }else{           
         setvalidation('subs_status','S',''); 
    }

    if(submircheak ==1){  
        return false;
    }else{
        $( "#EditSubsidaryForm" ).submit(); 
    }    
}

$('#brand_type').on('change', function() {
      var brand_id = this.value;
      $.ajax({
            type: "POST",
            url: urls+"/SuperAdmin/getModelInfo",
            data: {
             _token: $('#_token').val(),
             brand_id: brand_id
            },
            dataType:"html",
            success: function(msg){
               var obj = jQuery.parseJSON(msg);
               $("#model_type").html(obj.model_list);
            }
        });
    });




function createFleet(){

    var submircheak = 0 ;

    var cab_type = jQuery('#cab_type').val();    
    if (cab_type==null || cab_type==""){             
        submircheak =1; 
        setvalidation('cab_type','F',"Please Enter Cab Type");
    }else{           
         setvalidation('cab_type','S',''); 
    }
    
    var fuel_type = jQuery('#fuel_type').val();    
    if (fuel_type==null || fuel_type==""){             
        submircheak =1; 
        setvalidation('fuel_type','F',"Please Enter Fuel Type");
     }else{           
         setvalidation('fuel_type','S',''); 
    }

    var brand_type = jQuery('#brand_type').val();    
    if (brand_type==null || brand_type==""){             
        submircheak =1; 
        setvalidation('brand_type','F',"Please Enter Brand Type");
    }else{           
         setvalidation('brand_type','S',''); 
    }

    var model_type = jQuery('#model_type').val();    
    if (model_type==null || model_type==""){             
        submircheak =1; 
        setvalidation('model_type','F',"Please Enter Model Type");
    }else{           
         setvalidation('model_type','S',''); 
    }

    var seating_capacity = jQuery('#seating_capacity').val();    
    if (seating_capacity==null || seating_capacity==""){             
        submircheak =1; 
        setvalidation('seating_capacity','F',"Please Enter Seating Capacity");
    }else{           
         setvalidation('seating_capacity','S',''); 
    }

    var chassis_number = jQuery('#chassis_number').val();    
    if (chassis_number==null || chassis_number==""){             
        submircheak =1; 
        setvalidation('chassis_number','F',"Please Enter Chasis Number");
    }else{           
         setvalidation('chassis_number','S',''); 
    }

    var engine_number = jQuery('#engine_number').val();    
    if (engine_number==null || engine_number==""){             
        submircheak =1; 
        setvalidation('engine_number','F',"Please Enter Engine Number");
    }else{           
         setvalidation('engine_number','S',''); 
    }

    var engine_cc = jQuery('#engine_cc').val();    
    if (engine_cc==null || engine_cc==""){             
        submircheak =1; 
        setvalidation('engine_cc','F',"Please Enter Engine cc");
    }else{           
         setvalidation('engine_cc','S',''); 
    }

    var device_id = jQuery('#device_id').val();    
    if (device_id==null || device_id==""){             
        submircheak =1; 
        setvalidation('device_id','F',"Please Enter Device Id");
    }else{           
         setvalidation('device_id','S',''); 
    }
    var manufacturing_year = jQuery('#manufacturing_year').val();    
    if (manufacturing_year==null || manufacturing_year==""){             
        submircheak =1; 
        setvalidation('manufacturing_year','F',"Please Enter Manufacturing Year");
    }else{           
         setvalidation('manufacturing_year','S',''); 
    }
    var registration_number = jQuery('#registration_number').val();    
    if (registration_number==null || registration_number==""){             
        submircheak =1; 
        setvalidation('registration_number','F',"Please Enter Registration Number");
    }else{           
         setvalidation('registration_number','S',''); 
    }
   
    if(submircheak ==1){  
        return false;
    }else{
        $( "#saveFleetForm" ).submit(); 
    }    
}



function AddClient(){

    var submircheak = 0 ;

    var company_id = jQuery('#company_id').val();    
    if (company_id==null || company_id==""){             
        submircheak =1; 
        setvalidation('company_id','F',"Please select Company");
    }else{           
         setvalidation('company_id','S',''); 
    }

    var subsidiary_id = jQuery('#subsidiary_id').val();    
    if (subsidiary_id==null || subsidiary_id==""){             
        submircheak =1; 
        setvalidation('subsidiary_id','F',"Please select Subsidiary");
    }else{           
         setvalidation('subsidiary_id','S',''); 
    }

    var organization_name = jQuery('#organization_name').val();    
    if (organization_name==null || organization_name==""){             
        submircheak =1; 
        setvalidation('organization_name','F',"Please Enter Organization Name");
    }else{           
         setvalidation('organization_name','S',''); 
    }
    
    var department_name = jQuery('#department_name').val();    
    if (department_name==null || department_name==""){             
        submircheak =1; 
        setvalidation('department_name','F',"Please Enter department_name");
     }else{           
         setvalidation('department_name','S',''); 
    }

    var state = jQuery('#state').val();    
    if (state==null || state==""){             
        submircheak =1; 
        setvalidation('state','F',"Please Select States");
    }else{           
         setvalidation('state','S',''); 
    }

    var city = jQuery('#city').val();    
    if (city==null || city==""){             
        submircheak =1; 
        setvalidation('city','F',"Please Select City");
    }else{           
         setvalidation('city','S',''); 
    }

    var address = jQuery('#address').val();    
    if (address==null || address==""){             
        submircheak =1; 
        setvalidation('address','F',"Please Enter Address");
    }else{           
         setvalidation('address','S',''); 
    }

    var pan_no = jQuery('#pan_no').val();    
    if (pan_no==null || pan_no==""){             
        submircheak =1; 
        setvalidation('pan_no','F',"Please Enter Pan Number");
    }else{           
         setvalidation('pan_no','S',''); 
    }

    var tender_from = jQuery('#tender_from').val();    
    if (tender_from==null || tender_from==""){             
        submircheak =1; 
        setvalidation('tender_from','F',"Please Select Date");
    }else{           
         setvalidation('tender_from','S',''); 
    }

    var tender_to = jQuery('#tender_to').val();    
    if (tender_to==null || tender_to==""){             
        submircheak =1; 
        setvalidation('tender_to','F',"Please Select Date");
    }else{           
         setvalidation('tender_to','S',''); 
    }


   
    if(submircheak ==1){  
        return false;
    }else{
        $( "#SaveCustomerForm" ).submit(); 
    }    
}




function EditClient(){

    var submircheak = 0 ;

    var organization_name = jQuery('#organization_name').val();    
    if (organization_name==null || organization_name==""){             
        submircheak =1; 
        setvalidation('organization_name','F',"Please Enter Organization Name");
    }else{           
         setvalidation('organization_name','S',''); 
    }
    
    var department_name = jQuery('#department_name').val();    
    if (department_name==null || department_name==""){             
        submircheak =1; 
        setvalidation('department_name','F',"Please Enter department_name");
     }else{           
         setvalidation('department_name','S',''); 
    }

    var state = jQuery('#state').val();    
    if (state==null || state==""){             
        submircheak =1; 
        setvalidation('state','F',"Please Select States");
    }else{           
         setvalidation('state','S',''); 
    }

    var city = jQuery('#city').val();    
    if (city==null || city==""){             
        submircheak =1; 
        setvalidation('city','F',"Please Select City");
    }else{           
         setvalidation('city','S',''); 
    }

    var address = jQuery('#address').val();    
    if (address==null || address==""){             
        submircheak =1; 
        setvalidation('address','F',"Please Enter Address");
    }else{           
         setvalidation('address','S',''); 
    }

    var pan_no = jQuery('#pan_no').val();    
    if (pan_no==null || pan_no==""){             
        submircheak =1; 
        setvalidation('pan_no','F',"Please Enter Pan Number");
    }else{           
         setvalidation('pan_no','S',''); 
    }

    var tender_from = jQuery('#tender_from').val();    
    if (tender_from==null || tender_from==""){             
        submircheak =1; 
        setvalidation('tender_from','F',"Please Select Date");
    }else{           
         setvalidation('tender_from','S',''); 
    }

    var tender_to = jQuery('#tender_to').val();    
    if (tender_to==null || tender_to==""){             
        submircheak =1; 
        setvalidation('tender_to','F',"Please Select Date");
    }else{           
         setvalidation('tender_to','S',''); 
    }

    var no_of_cabs = jQuery('#no_of_cabs').val();    
    if (no_of_cabs==null || no_of_cabs==""){             
        submircheak =1; 
        setvalidation('no_of_cabs','F',"Please Enter number of cabs");
    }else{           
         setvalidation('no_of_cabs','S',''); 
    }
   
    if(submircheak ==1){  
        return false;
    }else{
        $( "#EditCustomerForm" ).submit(); 
    }    
}

function assignCustomer(){

    var submircheak = 0 ;

    var customers_id = jQuery('#customers_id').val();    
    if (customers_id==null || customers_id==""){             
        submircheak =1; 
        setvalidation('customers_id','F',"Please Enter Organization Name");
    }else{           
         setvalidation('customers_id','S',''); 
    }
    if(submircheak ==1){  
        return false;
    }else{
        $( "#assignCustomerForm" ).submit(); 
    }    
}




function createPaymentRequest(){


    var submircheak = 0 ;

    var company_id = jQuery('#company_id').val();    
    if (company_id==null || company_id==""){             
        submircheak =1; 
        setvalidation('company_id','F',"Please Select Company ID");
    }else{           
         setvalidation('company_id','S',''); 
    }
    
    var subsidiary_id = jQuery('#subsidiary_id').val();    
    if (subsidiary_id==null || subsidiary_id==""){             
        submircheak =1; 
        setvalidation('subsidiary_id','F',"Please Select subsidiary id");
     }else{           
         setvalidation('subsidiary_id','S',''); 
    }

    var client_id = jQuery('#client_id').val();    
    if (client_id==null || client_id==""){             
        submircheak =1; 
        setvalidation('client_id','F',"Please Select States");
    }else{           
         setvalidation('client_id','S',''); 
    }

    var fleet_id = jQuery('#fleet_id').val();    
    if (fleet_id==null || fleet_id==""){             
        submircheak =1; 
        setvalidation('fleet_id','F',"Please Select Fleet Id");
    }else{           
         setvalidation('fleet_id','S',''); 
    }

    var expense_id = jQuery('#expense_id').val();    
    if (expense_id==null || expense_id==""){             
        submircheak =1; 
        setvalidation('expense_id','F',"Please Select Expense Id");
    }else{           
         setvalidation('expense_id','S',''); 
    }

    var base_amount = jQuery('#base_amount').val();    
    if (base_amount==null || base_amount==""){             
        submircheak =1; 
        setvalidation('base_amount','F',"Please Enter Base Amount");
    }else{           
         setvalidation('base_amount','S',''); 
    }

    var gst_percent = jQuery('#gst_percent').val();    
    if (gst_percent==null || gst_percent==""){             
        submircheak =1; 
        setvalidation('gst_percent','F',"Please insert gst percent");
    }else{           
         setvalidation('gst_percent','S',''); 
    }

    var gst_amount = jQuery('#gst_amount').val();    
    if (gst_amount==null || gst_amount==""){             
        submircheak =1; 
        setvalidation('gst_amount','F',"Please Enter Gst Ammount");
    }else{           
         setvalidation('gst_amount','S',''); 
    }

    var remark = jQuery('#remark').val();    
    if (remark==null || remark==""){             
        submircheak =1; 
        setvalidation('remark','F',"Please Enter Remark");
    }else{           
         setvalidation('remark','S',''); 
    }
   
    if(submircheak ==1){  
        return false;
    }else{
        $( "#SaveRaisereqForm" ).submit(); 
    }    
}




function PaymentRequest(){


    var submircheak = 0 ;

    var company_id = jQuery('#company_id').val();    
    if (company_id==null || company_id==""){             
        submircheak =1; 
        setvalidation('company_id','F',"Please Select Company ID");
    }else{           
         setvalidation('company_id','S',''); 
    }
    
    var subsidiary_id = jQuery('#subsidiary_id').val();    
    if (subsidiary_id==null || subsidiary_id==""){             
        submircheak =1; 
        setvalidation('subsidiary_id','F',"Please Select subsidiary id");
     }else{           
         setvalidation('subsidiary_id','S',''); 
    }

    var client_id = jQuery('#client_id').val();    
    if (client_id==null || client_id==""){             
        submircheak =1; 
        setvalidation('client_id','F',"Please Select States");
    }else{           
         setvalidation('client_id','S',''); 
    }

    var fleet_id = jQuery('#fleet_id').val();    
    if (fleet_id==null || fleet_id==""){             
        submircheak =1; 
        setvalidation('fleet_id','F',"Please Select Fleet Id");
    }else{           
         setvalidation('fleet_id','S',''); 
    }


    var device_type = jQuery('#device_type').val();    
    if (device_type==null || device_type==""){             
        submircheak =1; 
        setvalidation('device_type','F',"Please Select Device Type");
    }else{           
         setvalidation('device_type','S',''); 
    }


    var expense_id = jQuery('#expense_id').val();    
    if (expense_id==null || expense_id==""){             
        submircheak =1; 
        setvalidation('expense_id','F',"Please Select Expense Id");
    }else{           
         setvalidation('expense_id','S',''); 
    }

    var base_amount = jQuery('#base_amount').val();    
    if (base_amount==null || base_amount==""){             
        submircheak =1; 
        setvalidation('base_amount','F',"Please Enter Base Amount");
    }else{           
         setvalidation('base_amount','S',''); 
    }

    var gst_percent = jQuery('#gst_percent').val();    
    if (gst_percent==null || gst_percent==""){             
        submircheak =1; 
        setvalidation('gst_percent','F',"Please insert gst percent");
    }else{           
         setvalidation('gst_percent','S',''); 
    }

    var gst_amount = jQuery('#gst_amount').val();    
    if (gst_amount==null || gst_amount==""){             
        submircheak =1; 
        setvalidation('gst_amount','F',"Please Enter Gst Ammount");
    }else{           
         setvalidation('gst_amount','S',''); 
    }

    var remark = jQuery('#remark').val();    
    if (remark==null || remark==""){             
        submircheak =1; 
        setvalidation('remark','F',"Please Enter Remark");
    }else{           
         setvalidation('remark','S',''); 
    }
   
    if(submircheak ==1){  
        return false;
    }else{
        $( "#PaymentReqForm" ).submit(); 
    }    
}

 $('#user_type_id').on('change', function() {
      var user_type = this.value;
      if(user_type == '2' || user_type == '4'){
        $('#rmsection').show();
        $.ajax({
            type: "POST",
            url: urls+"/Home/getUserInfoByUserType",
            data: {
             _token: $('#_token').val(),
             user_type: user_type
            },
            dataType:"html",
            success: function(msg){ 
                var obj = jQuery.parseJSON(msg);
                $("#reporting_manager").html(obj.user_list);
            }  
        });

      }else{
        $('#rmsection').hide();
      }
      
    });

 

function AddUser(){


    var submircheak = 0 ;

    var user_type_id = jQuery('#user_type_id').val();    
    if (user_type_id==null || user_type_id==""){             
        submircheak =1; 
        setvalidation('user_type_id','F',"Please Select user type id");
    }else{           
         setvalidation('user_type_id','S',''); 
    }
    
    var company_id = jQuery('#company_id').val();    
    if (company_id==null || company_id==""){             
        submircheak =1; 
        setvalidation('company_id','F',"Please Select company id");
     }else{           
         setvalidation('company_id','S',''); 
    }

    var subsidiary_id = jQuery('#subsidiary_id').val();    
    if (subsidiary_id==null || subsidiary_id==""){             
        submircheak =1; 
        setvalidation('subsidiary_id','F',"Please Select Subsidiary id");
    }else{           
         setvalidation('subsidiary_id','S',''); 
    }

    var username = jQuery('#username').val();    
    if (username==null || username==""){             
        submircheak =1; 
        setvalidation('username','F',"Please Enter UserName");
    }else{           
         setvalidation('username','S',''); 
    }

    var email_id = jQuery('#email_id').val();    
    if (email_id==null || email_id==""){             
        submircheak =1; 
        setvalidation('email_id','F',"Please Insert Email Id");
    }else{           
         setvalidation('email_id','S',''); 
    }

    var password = jQuery('#password').val();    
    if (password==null || password==""){             
        submircheak =1; 
        setvalidation('password','F',"Please Insert Password");
    }else{           
         setvalidation('password','S',''); 
    }
   
    if(submircheak ==1){  
        return false;
    }else{
        $( "#SaveUserForm" ).submit(); 
    }    
}

