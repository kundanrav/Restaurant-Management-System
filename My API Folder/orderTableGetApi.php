//Order Table Data Get Api Route *******************
Route::get('order',[HomeController::class,'order']);
//************************************************ */



//order  Api Function********************
    function order(){

        $order = order::all();

        if ($order->count()>0) {
            return response()->json([
                'status'=>200,
                'message'=>$order
            ],200);
        }
        else {
            return response()->json([
                'status'=>404,
                'message'=>'No record found'
            ],404);
        }
        
    }
    //************************************************* */




    //Specific Column Select Api Function********************
    function order(){

        $order = order::select('id','foodname','price','quantity','name','phone','address')->get();

        if ($order->count()>0) {
            return response()->json([
                'status'=>200,
                'data'=>$order
            ],200);
        }
        else {
            return response()->json([
                'status'=>404,
                'data'=>'No record found'
            ],404);
        }
        
    }
    //************************************************* */

    
//Order Table Post Api TO order item Route ***********************
Route::post('addorder',[HomeController::class,'addorder']);
//*********************************************************** */


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



    //Fetch Specific Record Using ID


//Order Table Fetch Data Specific user using Id

Route::get('order/{id}',[HomeController::class,'showorder']);

//************************************************* */



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



            //Updatext Record




            
//Update  Data Using API ***************

Route::get('order/{id}/edit',[HomeController::class,'edit']);

//Update

Route::put('order/{id}/edit',[HomeController::class,'update']);

//******************************************** */


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





