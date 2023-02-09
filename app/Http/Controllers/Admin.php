<?php
namespace App\Http\Controllers;
use App\Models\Common_model as Common_model;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class Admin extends Controller
{
   private $Common_model; 
    public function __construct(Common_model $Common_model){
        $this->Common_model = $Common_model; 
    }
    public function index() {
      // $data['title'] = 'Admin Login';
      // $data['nav'] = 'admin';
     return view('admin_login');
    }
public function dashboard(){
      // $data['title'] = 'Dashboard';
      // $data['nav'] = 'dashboard';
     return view('dashboard');  //
    }
public function Associatedashboard(){
      // $data['title'] = 'Associate Dashboard';
      // $data['nav'] = 'dashboard';
     return view('associate-dashboard');
    // return view('associate-dashboard',$data);
}
public function createProduct(){
   
     return view('back-end/create_product');
    }
 
}