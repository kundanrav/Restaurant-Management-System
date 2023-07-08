<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Foodchef;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Order;



class AdminController extends Controller
{
    public function user(){
        $data=user::all();
        return view("admin.user",compact("data"));
    }

    public function deleteuser($id){
        $data=user::find($id);
        $data->delete();
        return redirect()->back();

    }



    
    public function foodmenu(){
        $data=food::all();
        return view("admin.foodmenu",compact('data'));

    }

    public function uploadfood(Request $request){
        
        $data = new food;
        $image=$request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        return redirect()->back()->with('status', 'Food Added Successfully');
    }



    //delete food menu in admin panel********************
    public function deletemenu($id)
    {
        $data=food::find($id);
        $data->delete();
        return redirect()->back()->with('status', 'Food Deleted Successfully');;
    }
    //**************************************************** */

    
    //Update food menu in admin panel********************
    
    public function updatemenuview($id)
    {
        $data=food::find($id);
       
        return view("admin.updatemenuview",compact('data'));
    }
    //**************************************************** */


    //update data store********************************
    public function update($id,Request $request)
    {
        $data = food::find($id);

        $image=$request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        return redirect('/foodmenu')->with('status', 'Food Updated Successfully');

    }
    //***************************************************** */

    

    //Reservation Table Data Store*********************************** */
    public function reservation(Request $request)
    {
        $data = new reservation;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->guest=$request->guest;
        $data->date=$request->date; 
        $data->time=$request->time;
        $data->message=$request->message;
        $data->save();
        return redirect()->back();
    }

    //************************************************************************** */


    //View Reservation in Admin Panel******************************
    public function viewreservation()
    {
        $data = reservation::all();
        return view("admin.adminreservation",compact('data'));
    }
    //*************************************************************** */



        //View Chef in Admin Panel******************************
        public function viewchef()
        {
          $data = foodchef::all();
            return view("admin.adminchef", compact("data"));
        }
        //*************************************************************** */

        //Add Chef in admin******************************************
        public function uploadchef(Request $request){
            $data =new foodchef;

            $image=$request->image;

            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('chefimage',$imagename);
            $data->image=$imagename;
            $data->name=$request->name;
            $data->speciality=$request->speciality;
           
            $data->save();
            return redirect()->back()->with('status', 'Chef Added Successfully');


        }
        //***************************************************************** */

        //Update Chef ***********************
        public function updatechef($id)
        {
            $data = foodchef::find($id);
            return view("admin.updatechef",compact('data'));
        }
        //**************END********************* */

          //Store Updated  Chef Data***********************
                public function updatefoodchef(Request $request,$id)
                {
                    $data = foodchef::find($id);

                    $image=$request->image;

                    if ($image) {
                        $imagename=time().'.'.$image->getClientOriginalExtension();
                        $request->image->move('chefimage',$imagename);
                        $data->image=$imagename;
                    }
                 
                    $data->name=$request->name;
                    $data->speciality=$request->speciality;
                   
                    $data->save();
                    return redirect('/viewchef')->with('status', 'Data Updated Successfully');
                }
        //**************END********************* */





        //********Delete Chef************************/
        public function deletechef($id)
        {
            $data = foodchef::find($id);
            $data->delete();
            return redirect("viewchef")->with('status', 'Data Deleted Successfully');
        }
        //***********END******************************* */






        //Orderd food in Admin Panel*********************************
        public function orders(){


            $data=order::all();
            return view('admin.orders',compact('data'));
        }
        //************************************************************** */



           // food Orderd Search in Admin Panel*********************************
           public function search(Request $request){

            $search=$request->search;

            $data=order::where('name','Like','%'.$search.'%')->orWhere('foodname','Like','%'.$search.'%')->get();
            return view('admin.orders',compact('data'));
        }
        //************************************************************** */
}
