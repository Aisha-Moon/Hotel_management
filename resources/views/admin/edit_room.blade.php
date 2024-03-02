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
            <h1 class="font-weight-bold text-lg">Update ROOMS</h1>
            <br>
            <form action="{{ url('update_room/'.$getRecord->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">Room Title</label>
                    <input class="form-control" type="text" name="room_title" value="{{ $getRecord->room_title }}">
                </div>
                <div>
                    <label for="">Description</label>
                    <textarea class="form-control" name="description">{{ $getRecord->description }}</textarea>
                </div>
                <div>
                    <label for="">Price</label>
                    <input class="form-control" type="number" name="price" value="{{ $getRecord->price }}">
                </div>
                <div>
                    <label for="">Room Type</label>
                    <select class="form-control" name="room_type" >
                        <option {{ ($getRecord->room_type== 'regular') ? 'selected' : '' }} value="regular">Regular</option>
                        <option {{ ($getRecord->room_type== 'premium') ? 'selected' : '' }} value="premium">Premium</option>
                        <option {{ ($getRecord->room_type== 'deluxe') ? 'selected' : '' }} value="deluxe">Deluxe</option>
                    </select>
                </div>
                <div>
                    <label for="">Free Wifi</label>
                    <select class="form-control" name="wifi" >
                        <option {{ ($getRecord->wifi== 'yes') ? 'selected' : '' }} value="yes">Yes</option>
                        <option {{ ($getRecord->wifi== 'no') ? 'selected' : '' }} value="no">No</option>
                    </select>
                </div>
                <div>
                    <label for="">Current Image</label>
                    <img src="{{ asset('room/images/'.$getRecord->image) }}" alt="" width="60px;">

                </div>
                <div>
                    <label for="">Upload Image</label>
                    <input class="form-control" type="file" name="image" >

                    </div>
                <br>
                <div>
                    <input class="btn btn-primary" type="submit" value="UPDAte ROOM">
                </div>
            </form>
        </div>

      </div>
    </div>
 </div>

  @include('admin.footer')
  </body>
</html>
