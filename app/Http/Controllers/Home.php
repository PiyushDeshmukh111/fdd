<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Common_model as Common_model;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\CustomClasses\ColectionPaginate;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Session;
use Mail; 
use Hash;
class Home extends Controller
{
    private $Common_model; 
    public function __construct(Common_model $Common_model){
        $this->Common_model = $Common_model; 
    }
     
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/admin/login');
    }

    public function index(){
       $data['title']   = 'Home';
       return view('front-end/home', $data);
    }
    
    public function login(){
        $data['title']   = 'Login';
        $user_id  = session('user_id');
        if($user_id){
            return redirect('/Admin/dashboard');
        }else{
            return view('admin_login', $data);
        }
    }
    public function forgotPassword(){
       $data['title']   = 'Forgot Password';
       return view('back-end/forgot-password', $data);
    }
    public function checkDetails(){

        $email         = request('email');   
        $password      = request('password'); 
        $whereData     =  array('email'=>$email,'password'=>$password,'status'=>'1');
        $userInfos     = $this->Common_model->getData('gmr_user')->where($whereData);
        $count         = $userInfos->count();
        $redirect_url  = request('redirect_url');
        
        if($count == '0'){
            Session::flash('msg', 'Wrong email or password entered');
            if($redirect_url){
                return redirect($redirect_url);
            }else{
                return redirect('/Admin/dashboard');
            }
        }else{
            $userInfo = $userInfos->first();

            if($userInfo->status == '1'){
                $sess_data1['user_id']      = $userInfo->user_id;
                $sess_data1['user_type_id'] = $userInfo->user_type_id; 
                $sess_data1['screen_lock']  = '1';
                session($sess_data1);  
                $user_type_id = $userInfo->user_type_id;   
                if($user_type_id == '1'){
                    return redirect('Admin/dashboard');
                }else if($user_type_id == '2'){
                     return redirect('Associate/dashboard');

                }else{
                    Session::flash('msg', 'Your session has expired');
                    return redirect('/');  
                }
            }else{
                Session::flash('msg', 'Your account has been deactivated by admin');
                return redirect('/');
            } 
        }
    }
       public function register(){
       $data['title']   = 'Register';
    $user_id         = session('user_id');

       return view('register', $data);
    }
   public function registration(){
     $user_id    = session('user_id');
       $email   = request('email'); 
       $first_name      = request('first_name');   
       $last_name     = request('last_name'); 
       $password        = request('password');
       $data = array('first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'password'=>$password);
        $id  = $this->Common_model->saveDate('gmr_user',$data);
              return redirect('register');
          }
    public function productList(){
          $data['title'] = 'Product List';
          $data['product_list'] =Product::all();
   //return view ('productList')->with('product',$data);
       return view('productList', $data);
    }
    public function saveProduct(Request $request){
     // $product_id= session('product_id');
     //  $name  = request('name');
     //  $price  = request('price');
     //  $color =request('color');
     //  $image = request('image');

     //  $data = array('name'=>$name,'price'=>$price,'color'=>$color,'image'=>$image);
     //  $id = $this->Common_model->saveDate('product',$data);
     //  Session::flash('msg','Product hasbeen created successfull');
     //  return redirect('productList');
       $input = $request->all();
        Product::create($input);
        return redirect('productList')->with('flash_message', 'Contact Addedd!');  
    }
     public function editProduct($id){

   //       $data['title'] = 'Product List';
   //        $data['product_list'] =Product::all();
   // //return view ('productList')->with('product',$data);
   //     return view('productList', $data);
      // $whereData  = array('product_id'=>$product_id);
      // $data['title']    = 'Edit Product';
      //  // $data['_list'] = $this->Common_model->getData('sj_category')->get();
      // //  $data['product_effect'] = $this->Common_model->getData('sj_product_effect')->get();

      // // // $value=  'category_id';
      // // $data['nav']=  'product';
      // $whereData = array('product_id'=>$id);
      // $data['product_lists'] = $this->Common_model->getData('product')->where($whereData)->reorder('product_id', 'desc')->first();
      //   return view('edit_productList', $data);
     $data['title'] = 'Product List';

     $data['product_list'] = Product::find($id);
     return view('edit_productList', $data);
    }

public function updateproductList(Request $request,$id)
    {
        $product_list =Product::find($id);
        $product_list->name =$request->input('name');
        $product_list->price =$request->input('price');
        $product_list->color =$request->input('color');
        $product_list->image =$request->input('image');
        $product_list->update();
        return redirect('productList');
    }
    
 // public function deleteproducts($id=''){
 //      echo $product_id = session('product_id');
 //     $this->Common_model->deleteDate('product','product_id',$id);
 //      return redirect('productList'); 
 //    }
public function deleteproducts($id)
    {
    Product::destroy($id);
    return redirect('productList')->with('flash_message', 'Contact deleted!');  
    }
    
}