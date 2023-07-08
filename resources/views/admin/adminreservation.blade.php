@include('admin.adminheader')
<div class="d-flex">
@include('admin.navbar')
<div class="container">
    <div class="card">
        <div class="col-sm-12">
            <h2  class="mt-4 ml-3"   style="color: black;"> Reservations </h2> 
           <div class="table-responsive">
            <table class="table table-striped
            table-hover	
            table-borderless
            table-primary
            align-middle">
                <thead class="table-light">
     
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Message</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($data as $data)
        
                        <tr>
                            <td scope="row">{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->date}}</td>
                            <td>{{$data->time}}</td>
                            <td>{{$data->message}}</td>
                    
                           
                           
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
