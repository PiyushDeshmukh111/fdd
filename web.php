<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\FinanceAdmin;
use App\Http\Controllers\FinanceManager;
use App\Http\Controllers\FinanceExecutive;
use App\Http\Controllers\AccountProcessing;
use App\Http\Controllers\OperationsManager;
use App\Http\Controllers\OperationsExecutive;

use App\Http\Middleware\SuperAdminAuth; 
use App\Http\Middleware\FinanceAdminAuth; 
use App\Http\Middleware\FinanceManagerAuth; 
use App\Http\Middleware\FinanceExecutiveAuth; 
use App\Http\Middleware\AccountProcessingAuth; 
use App\Http\Middleware\OperationsManagerAuth; 
use App\Http\Middleware\OperationsExecutiveAuth; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::any('/',[Home::class,'index']);
Route::any('/logout',[Home::class,'logout']);
Route::any('Home/checkDetails',[Home::class,'checkDetails']);
Route::any('Home/checkEmailId',[Home::class,'checkEmailId']); 
Route::any('Home/checkMobileNumber',[Home::class,'checkMobileNumber']); 
Route::any('Home/checkMobileNumber',[Home::class,'checkMobileNumber']); 
Route::any('Home/getCityInfo',[Home::class,'getCityInfo']); 
Route::any('Home/getSubsidiaryInfo',[Home::class,'getSubsidiaryInfo']); 
Route::any('Home/getcabInfoByClientId',[Home::class,'getcabInfoByClientId']); 
Route::any('Home/getUserInfoByUserType',[Home::class,'getUserInfoByUserType']); 
Route::any('Home/getsubInfoByCompany',[Home::class,'getsubInfoByCompany']); 
Route::any('opps',[Home::class,'oops']); 

 

Route::group(['middleware' => ['SuperAdminAuth']], function (){
	Route::any('SuperAdmin/dashboard',[SuperAdmin::class,'dashboard']);

	// Users
	Route::any('SuperAdmin/allUsers',[SuperAdmin::class,'allUsers']);
	Route::any('SuperAdmin/addUser',[SuperAdmin::class,'addUser']);
	Route::any('SuperAdmin/editUser',[SuperAdmin::class,'editUser']);

	Route::any('SuperAdmin/createuser',[SuperAdmin::class,'createuser']);
 	Route::any('SuperAdmin/saveUser',[SuperAdmin::class,'saveUser']);
 	Route::any('SuperAdmin/editUser/{id}',[SuperAdmin::class,'editUser']);
 	Route::any('SuperAdmin/updateUsers',[SuperAdmin::class,'updateUsers']);



    // Customer
	Route::any('SuperAdmin/allCustomers',[SuperAdmin::class,'allCustomers']);
	Route::any('SuperAdmin/addCustomer',[SuperAdmin::class,'addCustomer']);
	Route::get('SuperAdmin/editcustomerDetails/{id}', [SuperAdmin::class,'editcustomerDetails']);
    Route::any('SuperAdmin/createCustomer',[SuperAdmin::class,'createCustomer']);
    Route::post('get-states-by-country',[SuperAdmin::class,'getState']);
    Route::post('get-cities-by-state',[SuperAdmin::class,'getCity']);
    Route::any('SuperAdmin/saveCustomerData',[SuperAdmin::class,'saveCustomerData']);
    Route::any('SuperAdmin/updatecustomersDetails',[SuperAdmin::class,'updatecustomersDetails']);



	// Fleet Section
	Route::any('SuperAdmin/allFleets',[SuperAdmin::class,'allFleets']);
	Route::any('SuperAdmin/addFleet',[SuperAdmin::class,'addFleet']);
	
	Route::any('SuperAdmin/editFleet/{id}',[SuperAdmin::class,'editFleet']);
	Route::any('SuperAdmin/getModelInfo',[SuperAdmin::class,'getModelInfo']);
	Route::any('SuperAdmin/saveFleet',[SuperAdmin::class,'saveFleet']);
	Route::any('SuperAdmin/assignFleet/{id}',[SuperAdmin::class,'assignFleet']); 
	Route::any('SuperAdmin/assignCustomerToFleet',[SuperAdmin::class,'assignCustomerToFleet']); 

	// Company  Section
	Route::any('SuperAdmin/allCompany',[SuperAdmin::class,'allCompany']);
	Route::any('SuperAdmin/addCompany',[SuperAdmin::class,'addCompany']);
	Route::get('SuperAdmin/editcompanyDetails/{id}', [SuperAdmin::class,'editcompanyDetails']);
	Route::any('SuperAdmin/updatecompanyDetails',[SuperAdmin::class,'updatecompanyDetails']);
   Route::any('SuperAdmin/createCompany',[SuperAdmin::class,'createCompany']);
   	Route::any('SuperAdmin/saveCompany',[SuperAdmin::class,'saveCompany']);




	// Company  Subsidiary Section
	Route::any('SuperAdmin/allSubsidiary',[SuperAdmin::class,'allSubsidiary']);
	Route::any('SuperAdmin/addSubsidiary',[SuperAdmin::class,'addSubsidiary']);
	Route::any('SuperAdmin/editSubsidiary',[SuperAdmin::class,'editSubsidiary']);
	Route::any('SuperAdmin/createSubsidary',[SuperAdmin::class,'createSubsidary']);
	Route::any('SuperAdmin/saveSubsidary',[SuperAdmin::class,'saveSubsidary']);
    Route::get('SuperAdmin/editsubsidaryDetails/{id}', [SuperAdmin::class,'editsubsidaryDetails']);
    Route::any('SuperAdmin/updateSubsidiaryDetails',[SuperAdmin::class,'updateSubsidiaryDetails']);





});

Route::group(['middleware' => ['OperationsExecutiveAuth']], function (){
	Route::any('OperationsExecutive/dashboard',[OperationsExecutive::class,'dashboard']);
	Route::any('OperationsExecutive/approveRequestList',[OperationsExecutive::class,'approveRequestList']);
	Route::any('OperationsExecutive/pendingRequestList',[OperationsExecutive::class,'pendingRequestList']);
	Route::any('OperationsExecutive/paymentRequest',[OperationsExecutive::class,'paymentRequest']);
	Route::any('OperationsExecutive/savePaymentRequest',[OperationsExecutive::class,'savePaymentRequest']);
	Route::any('OperationsExecutive/viewRequest/{id}',[OperationsExecutive::class,'viewRequest']);

});

Route::group(['middleware' => ['OperationsManagerAuth']], function (){
	Route::any('OperationsManager/dashboard',[OperationsManager::class,'dashboard']);
	Route::any('OperationsManager/pendingRequestList',[OperationsManager::class,'pendingRequestList']);
	Route::any('OperationsManager/approveRequestList',[OperationsManager::class,'approveRequestList']);
	Route::any('OperationsManager/raisePaymentRequest',[OperationsManager::class,'raisePaymentRequest']);
	Route::any('OperationsManager/savePaymentRequest',[OperationsManager::class,'savePaymentRequest']);
	Route::any('OperationsManager/approveRequest/{id}',[OperationsManager::class,'approveRequest']);
	Route::any('OperationsManager/viewRequest/{id}',[OperationsManager::class,'viewRequest']);
	Route::any('OperationsManager/rejectRequest/{id}',[OperationsManager::class,'rejectRequest']);
	Route::any('OperationsManager/approvePaymentRequestByOM',[OperationsManager::class,'approvePaymentRequestByOM']);
	Route::any('OperationsManager/rejectPaymentRequestByOM',[OperationsManager::class,'rejectPaymentRequestByOM']);

});


Route::group(['middleware' => ['FinanceExecutiveAuth']], function (){
	Route::any('FinanceExecutive/dashboard',[FinanceExecutive::class,'dashboard']);
	Route::any('FinanceExecutive/approveRequestList',[FinanceExecutive::class,'approveRequestList']);
	Route::any('FinanceExecutive/pendingRequestList',[FinanceExecutive::class,'pendingRequestList']);
	Route::any('FinanceExecutive/viewRequest/{id}',[FinanceExecutive::class,'viewRequest']);
	Route::any('FinanceExecutive/approveRequest/{id}',[FinanceExecutive::class,'approveRequest']);
	Route::any('FinanceExecutive/revert/{id}',[FinanceExecutive::class,'revert']);

});


Route::group(['middleware' => ['FinanceManagerAuth']], function (){
	Route::any('FinanceManager/dashboard',[FinanceManager::class,'dashboard']);
	Route::any('FinanceManager/paymentRequestList',[FinanceManager::class,'paymentRequestList']);

});

Route::group(['middleware' => ['FinanceAdminAuth']], function (){
	Route::any('FinanceAdmin/dashboard',[FinanceAdmin::class,'dashboard']);
	Route::any('FinanceAdmin/paymentRequestList',[FinanceAdmin::class,'paymentRequestList']);
});


Route::group(['middleware' => ['AccountProcessingAuth']], function (){
	Route::any('AccountProcessing/dashboard',[AccountProcessing::class,'dashboard']);
	Route::any('AccountProcessing/paymentRequestList',[AccountProcessing::class,'paymentRequestList']);

});









