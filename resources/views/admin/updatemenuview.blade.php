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
                <h2 style="color: black"> Food Menu </h2> 
                <form action="{{url('/update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Title</label>
                      <input type="text" name="title" id="" class="form-control" placeholder="" value="{{$data->title}}" aria-describedby="helpId">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input type="number" name="price" id="" class="form-control" placeholder="" value="{{$data->price}}" aria-describedby="helpId">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Old Image</label>
                        <img height="150" width="150" src="/foodimage/{{$data->image}}" alt="">
                        <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">

                    </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <input type="text" name="description" id="" class="form-control" placeholder=""  value="{{$data->description}}"aria-describedby="helpId">
                      </div>

                      <button type="submit" class="btn btn-primary">Save</button>
                </form>
                
                
            </div>
        </div>
    </div>
    @include('admin.adminfooter')
   