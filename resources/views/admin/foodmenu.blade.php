@include('admin.adminheader')
<div class="d-flex">
    @include('admin.navbar')
    <div class="container">
        @if (session('status'))
        <h6 class="alert alert-success">{{session('status')}}</h6>
            
        @endif
        <div class="card">
            <div class="col-sm-12">
                <h2 style="color: black"> Food Menu </h2> 
                <form action="{{url('/uploadfood')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Title</label>
                      <input type="text" name="title" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input type="number" name="price" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <input type="text" name="description" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>

                      <button type="submit" class="btn btn-primary">Save</button>
                </form>
                <div class="table-responsive mt-4">
                    <table class="table table-striped
                    table-hover	
                    table-borderless
                    table-primary
                    align-middle">
                        <thead class="table-dark">
                            
                            <tr>
                                <th>Food Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($data as $data)
                      
                                <tr>
                                    <td scope="row">{{$data->title}}</td>
                                    <td>{{$data->price}}</td>
                                    <td>{{$data->description}}</td>
                                    <td><img class="w-50" src="/foodimage/{{$data->image}}" alt=""></td>
                                    <td><a href="{{url('/deletemenu',$data->id)}}">Delete</a></td>
                                    <td><a href="{{url('/updatemenuview',$data->id)}}">Update</a></td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                            
                    </table>
                </div>
                
            </div>
        </div>
    </div>
    @include('admin.adminfooter')
   