@include('admin.adminheader')
<div class="d-flex">
@include('admin.navbar')
<div class="container">
    @if (session('status'))
    <h6 class="alert alert-success">{{session('status')}}</h6>
        
    @endif
    <div class="card">
        <div class="col-sm-12">
            <h2 style="color: black"> Admin Chef</h2> 
            <form action="{{url('/uploadchef')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
              <label for="" class="form-label">Name</label>
              <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Speciality</label>
                <input type="text" name="speciality" id="" class="form-control" placeholder="" aria-describedby="helpId">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
              </div>
             

              <button type="submit" class="btn btn-primary">Save</button>
        </form>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-striped
            table-hover	
            table-borderless
            table-primary
            align-middle">
                <thead class="table-light">
                    <caption>Table Name</caption>
                    <tr>
                        <th>Name</th>
                        <th>Speciality</th>
                        <th>Image</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($data as $data)
                        <tr class="table-primary" >
                            <td scope="row">{{$data->name}}</td>
                            <td>{{$data->speciality}}</td>
                            <td><img  src="chefimage/{{$data->image}}" alt=""></td>
                            <td><a href="{{url('/updatechef',$data->id)}}">Update</a></td>
                            <td><a href="{{url('/deletechef',$data->id)}}">Delete</a></td>
                        </tr>
                       
                        @endforeach
                       
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
            </table>
        </div>
    </div>
</div>
@include('admin.adminfooter')
