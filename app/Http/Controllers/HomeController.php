<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\User;
use App\Models\Foodchef;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Validator;




class HomeController extends Controller
{
    public function index()
    {
        $data = food::all();

        $chefdata = foodchef::all();
        return view("home", compact("data", "chefdata"));
    }

    public function redirects()
    {
        $data = food::all();
        $chefdata = foodchef::all();
        $usertype = Auth::User()->usertype;


        if ($usertype == '1') {
            return view('admin.admin');
        } else {
            $user_id = Auth::id();
            $count = cart::where('user_id', $user_id)->count();
            return view('home', compact("data", "chefdata", 'count'));
        }
    }


    //Add Cart ******************************
    public function addcart(Request $request, $id)
    {
        if (Auth::id()) {

            $user_id = Auth::id();

            $foodid = $id;
            $quantity = $request->quantity;

            $cart = new cart;
            $cart->user_id = $user_id;
            $cart->food_id = $user_id;
            $cart->quantity = $quantity;

            $cart->save();


            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }
    //****END********************************* */





    //Show Order Cart *********************************
    public function showcart(Request $request, $id)
    {


        $showcount = cart::where('user_id', $id)->count();
        $data2 = cart::select('*')->where('user_id', '=', $id)->get();
        $data = cart::where('user_id', $id)
            ->join('food', 'carts.food_id', '=', 'food.id')
            ->get();
        return view('showcart', compact('showcount', 'data', 'data2'));

    }
    //********END************************************* */






    //Show Ordered Cart Remove***************************

    public function remove($id)
    {
        $data = cart::find($id);
        $data->delete();
        return redirect()->back();
    }

    //*********END********************************** */ 




    // Cart Data Store orderconfirm***************************
    public function orderconfirm(Request $request)
    {
        foreach ($request->foodname as $key => $foodname) {
            $data = new order;

            $data->foodname = $foodname;
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->save();

        }

        return redirect()->back();


    }
    //*********END********************************** */



    //order  Api Function********************
    function order()
    {

        $order = order::select('id', 'foodname', 'price', 'quantity', 'name', 'phone', 'address')->get();

        if ($order->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $order
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No record found'
            ], 404);
        }

    }
    //************************************************* */






    //Add Order Data In Order Table******************

    public function addorder(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'foodname' => 'required|string',
            'price' => 'required|string',
            'quantity' => 'required|string',
            'name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string'

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors'=>$validator->messages(),

            ], 422);
        } else {

            $order = order::create([

                'foodname' => $request->foodname,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address

            ]);

            if ($order) {
                return response()->json([
                    'status' => 200,
                    'message' => "Your Order Successfully Added"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something You Want to Wrong"
                ], 200);
            }

        }


    }
    //***************************************************** */



    //Fetch Specific order data useing id
    public function showorder($id){

        $order =order::find($id);

        if ($order) {
            return response()->json([
                'status' => 200,
                'message' => $order,
            ], 200);
        }
        else {
            return response()->json([
                'status' => 500,
                'message' => "No Order Found"
            ], 200);
        }

    }
    //************************************ */

//Update Record in order table

public  function edit($id){

    $order = order::find($id);

    if ($order) {
        return response()->json([
            'status' => 200,
            'message' => $order,
        ], 200);
    }
    else {
        return response()->json([
            'status' => 500,
            'message' => "No Order Found"
        ], 200);
    }
}

//************************************update *************/
public function update(Request $request,$id){


    $validator = Validator::make($request->all(), [
        'foodname' => 'required|string',
        'price' => 'required|string',
        'quantity' => 'required|string',
        'name' => 'required|string',
        'phone' => 'required|string',
        'address' => 'required|string'

    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 422,
            'errors'=>$validator->messages(),

        ], 422);
    } else {

        $order = order::find($id);
       

        if ($order) {

            $order ->update([

                'foodname' => $request->foodname,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address
    
            ]);

            return response()->json([
                'status' => 200,
                'message' => "Your Order Updated Successfully"
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "No Such Record Found"
            ], 200);
        }

    }


}
//************* */
//******************************* */





//Delete Record in Order Table******************
public function destroy($id){


    $order = order::find($id);
    if($order)
   {
    $order->delete();

    return response()->json([
        'status' => 200,
        'message' => "Your Order has been Deleted Successfully"
    ], 200);
   }
   else {
    return response()->json([
        'status' => 500,
        'message' => "No Such Record Found"
    ], 200);
}

}
//************************************************* */


}