@include('admin.adminheader')
<div class="d-flex">
@include('admin.navbar')
<div class="container">
    <div class="card">
        <div class="col-sm-12">
            <h2 style="color: black; text-align:center; font-size:30px" class="mt-3">Customers Orders </h2> 


            <form action="{{url('/search')}}" method="get">
                <input type="text" name="search" placeholder="Search">
                <button type="submit" class="btn btn-success">Search</button>
            </form>




            <div class="table-responsive">
                <table class="table table-striped
                table-hover	
                table-borderless
                table-primary
                align-middle">
                    <thead class="table-light">
                        
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Foodname</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($data as $data)
                                
                          
                            <tr class="table-primary" >
                      
                                <td scope="row">{{$data->name}}</td>
                                <td>{{$data->phone}}</td>
                                <td>{{$data->address}}</td>
                                <td>{{$data->foodname}}</td>
                                <td>{{$data->price}}</td>
                                <td>{{$data->quantity}}</td>
                                <td>{{$data->price * $data->quantity}}</td>
                           
                               
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            
                        </tfoot>
                </table>
            </div>
            
            
        </div>
    </div>
</div>
@include('admin.adminfooter')
