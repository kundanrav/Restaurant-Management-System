<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [HomeController::class, "index"]);


Route::get('/users', [AdminController::class, "user"]);
Route::get('/deleteuser/{id}', [AdminController::class, "deleteuser"]);

Route::get('/foodmenu', [AdminController::class, "foodmenu"]);
//delete food menu in admin panel********************
Route::get('/deletemenu/{id}', [AdminController::class, "deletemenu"]);
//**************end********************************** */

//UPDATE food menu in admin panel********************

//update fetch data in form*************************
Route::get('/updatemenuview/{id}', [AdminController::class, "updatemenuview"]);
//******************************************** */

//store update data******************************
Route::post('/update/{id}', [AdminController::class, "update"]);





//Reservation Table Data**************************************************
Route::post('/reservation', [AdminController::class, "reservation"]);
//********************************************************************** */

//**viewreservation in admin panel************************************************** */
Route::get('/viewreservation', [AdminController::class, "viewreservation"]);
//************************************************************************************* */


//**Chef in admin panel************************************************** */
Route::get('/viewchef', [AdminController::class, "viewchef"]);
//************************************************************************************* */


//**Add Chef*************************************************** */
Route::post('/uploadchef', [AdminController::class, "uploadchef"]);
//********************************************************* */

//Update chef*********************************
Route::get('/updatechef/{id}', [AdminController::class, "updatechef"]);
//****END************************************* */



//Store Update Chef Data*********************************
Route::post('/updatefoodchef/{id}', [AdminController::class, "updatefoodchef"]);
//****END************************************* */




//Delete Chef Data*********************************
Route::get('/deletechef/{id}', [AdminController::class, "deletechef"]);
//****END************************************* */



//addcart*********************************
Route::post('/addcart/{id}',[HomeController::class, "addcart"]);
//****END************************************* */



//Show Ordered Cart***************************
Route::get('/showcart/{id}',[HomeController::class, "showcart"]);
//*********END********************************** */ 


//Show Ordered Cart Remove***************************
Route::get('/remove/{id}',[HomeController::class, "remove"]);
//*********END********************************** */ 


// Cart Data Store orderconfirm***************************
Route::post('/orderconfirm',[HomeController::class, "orderconfirm"]);
//*********END********************************** */ 



//Order Food in Admin Panel***************************
Route::get('/orders',[AdminController::class, "orders"]);
//*********END********************************** */ 


//Food   order Search in Admin Panel***************************
Route::get('/search',[AdminController::class, "search"]);
//*********END********************************** */ 




Route::post('/uploadfood', [AdminController::class, "uploadfood"]);


Route::get('/redirects', [HomeController::class, "redirects"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});