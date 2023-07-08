<base href="/public">

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
            <form action="{{url('/updatefoodchef',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
              <label for="" class="form-label">Name</label>
              <input type="text" name="name" id="" class="form-control" value="{{$data->name}}" placeholder="" aria-describedby="helpId">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Speciality</label>
                <input type="text" name="speciality" id="" class="form-control" value="{{$data->speciality}}" placeholder="" aria-describedby="helpId">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <img width="100" height="100" src="chefimage/{{$data->image}}" alt="">
                <input type="file" name="image" id="" class="form-control" value="{{$data->image}}" placeholder="" aria-describedby="helpId">
              </div>
             

              <button type="submit" class="btn btn-primary">Save</button>
        </form>
        </div>
       
    </div>
</div>
@include('admin.adminfooter')
