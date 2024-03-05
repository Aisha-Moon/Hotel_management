<!DOCTYPE html>
<html>
 <head>
    @include('admin.css')
 </head>
  <body>
   @include('admin.header')
   @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h1 style="font-size: 40px; font-weight:bold;">
                Gallery
            </h1>
           <div class="row">
            @foreach ($gallery as $gallery)
            <div style="col-md-4"> 
                <img src="gallery/{{ $gallery->image }}" style="height:200px;width:250px;" alt="">
                <a href="{{ url('delete_gallery',$gallery->id) }}" class="btn btn-danger">Delete</a>

            </div>
                
            @endforeach
           </div>

            @include('_message')

                <form action="{{ url('upload_gallery') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 10px;">
                        <label for="">Upload Image</label>
                        <input type="file" name="image" required class="form-control">
                   </div>

                <div>
                    <input type="submit" class="btn btn-primary" value="Submit">

                </div>
                </form>
       
          
          </div>
        </div>
    </div>
  
   @include('admin.footer')
  </body>
</html>
