<!DOCTYPE html>
<html>
 <head>
    @include('admin.css')
 </head>
  <body>
   @include('admin.header')
   @include('admin.sidebar')
   <div class="page-content">
    <div class="page-header">
      <div class="container-fluid">
        @include('_message')
        <div>
            <h1 class="font-weight-bold text-lg">ADD ROOMS</h1>
            <br>
            <form action="{{ url('add_room') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">Room Title</label>
                    <input class="form-control" type="text" name="room_title">
                </div>
                <div>
                    <label for="">Description</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <div>
                    <label for="">Price</label>
                    <input class="form-control" type="number" name="price">
                </div>
                <div>
                    <label for="">Room Type</label>
                    <select class="form-control" name="room_type" >
                        <option selected value="regular">Regular</option>
                        <option value="premium">Premium</option>
                        <option value="deluxe">Deluxe</option>
                    </select>
                </div>
                <div>
                    <label for="">Free Wifi</label>
                    <select class="form-control" name="wifi" >
                        <option selected value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div>
                    <label for="">Image</label>
                    <input class="form-control" type="file" name="image" >
                </div>
                <br>
                <div>
                    <input class="btn btn-primary" type="submit" value="ADD ROOM">
                </div>
            </form>
        </div>

      </div>
    </div>
 </div>

  @include('admin.footer')
  </body>
</html>
