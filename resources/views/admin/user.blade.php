@include('admin.adminheader')
<div class="d-flex">
@include('admin.navbar')
<div class="container">
    <div class="card">
        <div class="col-sm-12">
            <h2 style="color: black"> User Page </h2> 
            <div>
               <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            
                        <tr>
                            <td scope="row">{{$data->name}}</td>
                            <td>{{$data->email}}</td>

                            @if ($data->usertype=="0")
                            <td><a href="{{url('/deleteuser',$data->id)}}">Delete</a></td>
                            @else
                            <td>Not Allowed</td>                                
                            @endif
                           
                        </tr>
                        @endforeach
                    </tbody>
               </table>
            </div>
        </div>
    </div>
</div>
@include('admin.adminfooter')
