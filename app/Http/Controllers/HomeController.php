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
}