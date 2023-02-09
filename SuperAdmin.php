<?php

namespace App\Http\Controllers;
require app_path('Helpers/helper.php');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;
use App\Models\Userinfo;
use App\Models\Common_model as Common_model;
use Session;

class SuperAdmin extends Controller 
{
    private $Common_model; 
    public function __construct(Common_model $Common_model){
        $this->Common_model = $Common_model; 
    }

    public function dashboard(){
      $data['title'] = 'Dashboard';
      $data['nav'] = 'dashboard';
     return view('SuperAdmin/dashboard',$data);
    }

    // User Section 
    public function allUsers(){
        $userList = $this->Common_model->getData('sbl_user_info')->where('status','1')->get();
        return view('SuperAdmin/userManagement/allUsers',['title' => 'All Users','nav' => 'users','user_list' => $userList ]);
    }


    // Customer Section
    public function allCustomers(){
        $customerList = $this->Common_model->getData('sbl_customer_data')->get();
        return view('SuperAdmin/customerManagement/allCustomers',['title' => 'All Customer','nav' => 'users','customer_list' => $customerList ]);
    }

/////////////////////////////////////////////////////////////////
///////////// ////////////////Fleet Section//////////////////////
/////////////////////////////////////////////////////////////////

    public function allFleets(){
        $fleetData = $this->Common_model->getData('sbl_fleet_data')->get();
        return view('SuperAdmin/fleetManagement/allFleets',['title' => 'All Fleets','nav' => 'fleet','allFleets' => $fleetData ]);
    }  

   public function addFleet(){
        $cab_type   = $this->Common_model->getData('sbl_cab_type')->get();
        $cab_brand  = $this->Common_model->getData('sbl_cab_brand')->get();
        $fleetData  = $this->Common_model->getData('sbl_fleet_data')->get();
        return view('SuperAdmin/fleetManagement/addFleet',['title' => 'All Fleets','nav' => 'fleet','allFleets' => $fleetData,'cab_type'=>$cab_type,'cab_brand'=>$cab_brand ]);
    } 

    public function saveFleet(){

        $cab_type = request('company_id');
        $fuel_type = request('fuel_type');
        $brand_type = request('brand_type');
        $model_type = request('model_type');
        $seating_capacity = request('seating_capacity');
        $chassis_number = request('chassis_number');
        $engine_number = request('engine_number');
        $engine_cc = request('engine_cc');
        $device_type = request('device_type');
        $device_id = request('device_id');
        $manufacturing_year = request('manufacturing_year');
        $registration_number = request('registration_number');
        $invoice_number = request('invoice_number');

        $fleetData = array('cab_type_id'=>$cab_type,'device_type'=>$device_type,'reg_no'=>$registration_number,'fuel_type'=>$fuel_type,'brand_id'=>$brand_type,'seater'=>$seating_capacity,'model_id'=>$model_type,'chassis_no'=>$chassis_number,'engine_number'=>$engine_number,'cc'=>$engine_cc,'manufacture_year'=>$manufacturing_year,'invoice_number'=>$invoice_number);
        $fleet_id  = $this->Common_model->saveData('sbl_fleet_data',$fleetData);
        if($fleet_id){
            $updateData = array('cab_name' =>'SBL00'.$fleet_id);    
            $this->Common_model->updateData('sbl_fleet_data',array('fleet_id'=>$fleet_id), $updateData);
        }

        Session::flash('msg', 'New Fleet hasbeen created successfull');
        return redirect('SuperAdmin/allFleets');
    }

    public function getModelInfo(){
        $brand_id = request('brand_id');
        $model = $this->Common_model->getData('sbl_cab_model')->where(array('brand_id'=>$brand_id))->reorder('model_name', 'asc')->get();
        $model_list = '';
        $model_list  .= '<option value="">Please Select Model</option>';
        foreach ($model as $value){
            $model_list .= '<option value="'.$value->model_id.'">'.$value->model_name.'</option>';
        }
        $responce =  array('model_list'=>$model_list);
        echo json_encode($responce); die;

    }  

    public function assignFleet($id=0){
        $fleet_info = $this->Common_model->getData('sbl_fleet_data')->where('fleet_id',$id)->first();
        $customers  = $this->Common_model->getData('sbl_customer_data')->reorder('organization_name', 'asc')->get();
        return view('SuperAdmin/fleetManagement/assignFleet',['title' => 'Assign Fleet','nav' => 'fleet','fleet_info' => $fleet_info,'customers'=>$customers ]);

    }   


    public function assignCustomerToFleet(){

        $fleet_id = request('fleet_id');
        $customers_id = request('customers_id');
        $updateData = array('customer_id' =>$customers_id); 
        $this->Common_model->updateData('sbl_fleet_data',array('fleet_id'=>$fleet_id), $updateData);
        Session::flash('msg', 'Customer Successfully Assigned');
        return redirect('SuperAdmin/allFleets');
    }





/////////////////////////////////////////////////////////////////
///////////// ////////////////Company Section////////////////////
/////////////////////////////////////////////////////////////////

    public function allCompany(){
        $companyData = $this->Common_model->getData('sbl_company')->get();
        return view('SuperAdmin/companyManagement/allCompany',['title' => 'All Company','nav' => 'Company','companyData' => $companyData ]);
    }

    // Company  Subsidiary Section
    public function allSubsidiary(){
        $subsidiaryData = $this->Common_model->getData('sbl_subsidiary')->get();
        return view('SuperAdmin/subsidiaryManagement/allSubsidiary',['title' => 'All Subsidiary','nav' => 'Company','subsidiaryData' => $subsidiaryData ]);
    }
    
    public function editcompanyDetails($id=''){
        $data['title']    = 'Company List';
        $whereData = array('company_id'=>$id);
        $data['companyData'] = $this->Common_model->getData('sbl_company')->where($whereData)->reorder('company_id', 'desc')->first();
        return view('SuperAdmin/companyManagement/editCompany',$data);
    }

    public function updatecompanyDetails(){

        $company_id       = request('company_id');
        $comp_name        = request('comp_name');
        $comp_contact_no  = request('comp_contact_no');
        $comp_pan_no      = request('comp_pan_no');
        $comp_gst_no      = request('comp_gst_no');
        $comp_address     = request('comp_address');
        $upload_document  = request('upload_document');
        $updateArr = array('comp_name'=>$comp_name,'comp_contact_no'=>$comp_contact_no,'comp_pan_no'=>$comp_pan_no,'comp_gst_no'=>$comp_gst_no ,'comp_address'=>$comp_address,'upload_document'=>$upload_document);
        $this->Common_model->updateData('sbl_company',array('company_id'=>$company_id), $updateArr);
        return redirect('SuperAdmin/allCompany');
    }

    public function createCompany(){
       $companyData = $this->Common_model->getData('sbl_company')->get();
       return view('SuperAdmin/companyManagement/createCompany',['title' => 'Company Create','nav' => 'Company','all_company' => $companyData]);
    }

    public function saveCompany(){
      
      $comp_name = request('comp_name');
      $comp_contact_no = request('comp_contact_no');
      $comp_pan_no = request('comp_pan_no');
      $comp_gst_no = request('comp_gst_no');
      $comp_address = request('comp_address');
      $upload_document = request('upload_document');
      $company_id  = request('company_id');
      $data = array('comp_name'=>$comp_name,'comp_contact_no'=>$comp_contact_no,'comp_pan_no'=>$comp_pan_no,'comp_gst_no'=>$comp_gst_no,'comp_address'=>$comp_address,'upload_document'=>$upload_document,'status'=>'1');
      $id  = $this->Common_model->saveData('sbl_company',$data);
      Session::flash('msg', 'Staff hasbeen created successfull');
      return redirect('SuperAdmin/allCompany');


    }

    public function createSubsidary(){
        $sets['companyDatas'] =$this->Common_model->getData('sbl_company')->get();
        $companyData = $this->Common_model->getData('sbl_subsidiary')->get();
        return view('SuperAdmin/subsidiaryManagement/addSubsidiary',['title' => 'Company Create','nav' => 'Company','all_company' => $companyData])->with($sets);
    }

    public function saveSubsidary(){
      
        $subsidiary_name = request('subsidiary_name');
        $subs_status = request('subs_status');
        $subsidiary_id   = request('subsidiary_id');
        $company_id   = request('company_id');
        $data = array('subsidiary_name'=>$subsidiary_name,'company_id'=>$company_id,'subs_status'=>$subs_status);
        $id  = $this->Common_model->saveData('sbl_subsidiary',$data);
        Session::flash('msg', 'Staff hasbeen created successfull');
        return redirect('SuperAdmin/allSubsidiary');
    }
    
    public function editsubsidaryDetails($id=''){
        $data['title']    = 'Subsidary List';
        $sets['companyDatas'] =$this->Common_model->getData('sbl_company')->get();
        $whereData = array('subsidiary_id'=>$id);
        $data['companyData'] = $this->Common_model->getData('sbl_subsidiary')->where($whereData)->reorder('subsidiary_id', 'desc')->first();
        return view('SuperAdmin/subsidiaryManagement/editSubsidiary',$data)->with($sets);
    }
    
    public function updateSubsidiaryDetails(){

        $subsidiary_id    = request('subsidiary_id');
        $subsidiary_name  = request('subsidiary_name');
        $subs_status      = request('subs_status');
        $company_id       = request('company_id');
        $updateArr = array('subsidiary_name'=>$subsidiary_name,'subs_status'=>$subs_status,'company_id'=>$company_id);
        $this->Common_model->updateData('sbl_subsidiary',array('subsidiary_id'=>$subsidiary_id), $updateArr);
        return redirect('SuperAdmin/allSubsidiary');
    }

    public function createCustomer(Request $request){
        $states =$this->Common_model->getData('sbl_state')->get();
        $city= $this->Common_model->getData('sbl_city')->get();
        $companyData      = $this->Common_model->getData('sbl_company')->get();
        $data = $this->Common_model->getData('sbl_customer_data')->get();
        return view('SuperAdmin/customerManagement/addClient',['title' => 'Create Customer','nav' => 'customer','all_company' =>$data, 'states'=>$states, 'city_list'=>$city, 'all_company' => $companyData ]);
    }

 public function saveCustomerData(){
      
      $company_id = request('company_id');
      $subsidiary_id = request('subsidiary_id');
      $organization_name = request('organization_name');
      $department_name = request('department_name');
      $state_id = request('state_id');
      $city_id = request('city_id');
      $address = request('address');
      $org_type = request('org_type');
      $pan_no = request('pan_no');
      $gst_no = request('gst_no');
      $tender_from = request('tender_from');
      $tender_to = request('tender_to');
      $data = array(
        'organization_name'=>$organization_name,
      	'company_id'=>$company_id,
        'subsidiary_id'=>$subsidiary_id,
        'state_id'=>$state_id,
      	'city_id'=>$city_id,
      	'address'=>$address,
      	'org_type'=>$org_type,
      	'pan_no'=>$pan_no,
      	'gst_no'=>$gst_no,
      	'tender_from'=>$tender_from,
      	'tender_to'=>$tender_to,
      	'department_name'=>$department_name
      );
      $id  = $this->Common_model->saveData('sbl_customer_data',$data);
      Session::flash('msg', 'Staff hasbeen created successfull');
      return redirect('SuperAdmin/allCustomers');


    }
    public function editcustomerDetails($id=''){
     $states =$this->Common_model->getData('sbl_state')->get();

     $city= $this->Common_model->getData('sbl_city')->get();


//     $city= $this->Common_model->getData('sbl_city')->where('state_id','1')->get();




      $whereData = array('customer_id'=>$id);
      $customer_list = $this->Common_model->getData('sbl_customer_data')->where($whereData)->reorder('customer_id', 'desc')->first();
        return view('SuperAdmin/customerManagement/editClient',['title' => 'Company Create','nav' => 'Company','customer_list' =>$customer_list, 'states'=>$states, 'city'=>$city]);

    }


    public function updatecustomersDetails(){
	   $customer_id    = request('customer_id');
      $organization_name  = request('organization_name');
      $department_name      = request('department_name');
      $state_id      = request('state_id');
      $city_id        = request('city_id');
      $address        = request('address');
      $org_type        = request('org_type');
      $pan_no        = request('pan_no');
      $gst_no        = request('gst_no');
      $tender_from        = request('tender_from');
      $tender_to        = request('tender_to');
      $no_of_cabs        = request('no_of_cabs');

     $updateArr = array('organization_name'=>$organization_name,'department_name'=>$department_name,'state_id'=>$state_id,'city_id'=>$city_id,'address'=>$address,'org_type'=>$org_type,'pan_no'=>$pan_no,'gst_no'=>$gst_no,'tender_from'=>$tender_from,'tender_to'=>$tender_to,'no_of_cabs'=>$no_of_cabs);



    $this->Common_model->updateData('sbl_customer_data',array('customer_id'=>$customer_id), $updateArr);
      return redirect('SuperAdmin/allCustomers');
    }



    public function saveUser(Request $request){

        $input = $request->all();
        Userinfo::create($input);
        Session::flash('success',"Data has been Added succesfully");
        return redirect("SuperAdmin/allUsers");
    }


    public function createuser(Request $request){
        $sets['companyDatas'] =$this->Common_model->getData('sbl_user_type')->get();
        $usertypeId = array('3','5');
        $user_list['reporting'] = $this->Common_model->getData('sbl_user_info')->whereIn('user_type_id', $usertypeId)->get();
        $company['all_company'] =$this->Common_model->getData('sbl_company')->get();
        $subtypeId = array('1','2','3');
        $sub_list['sub_list'] = $this->Common_model->getData('sbl_subsidiary')->whereIn('subsidiary_id', $subtypeId)->get();
        return view("SuperAdmin/userManagement/createUser",['title' => 'Payment Request List'])->with($sets)->with($user_list)->with($company);
    }


    public function editUser($id=0){
        
        $whereData = array('user_id'=>$id);
        
        $data['userData'] = $this->Common_model->getData('sbl_user_info')->where($whereData)->first();
        return view('SuperAdmin/userManagement/editUser',$userData);
    }
}
   