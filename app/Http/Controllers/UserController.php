<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;

 
class UserController extends Controller 
    {
     private $Common_model; 
    public function __construct(Common_model $Common_model){
        $this->Common_model = $Common_model; 
    }
    public function getData(){
      $product_list = Common_model::paginate(8);
      return view('product_list', compact('product_list'));
    }
}