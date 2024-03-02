<!DOCTYPE html>
<html>
 <head>
    @include('admin.css')
    <style type="text/css">
    .table-deg{
        border:2px solid white;
        margin:auto;
        width:50%;
        text-align: center;
        margin-top: 50px;
    }
    th{
        background-color: skyblue;
        padding: 30px;
    }
    tr{
        border:3px solid white;

    }
    td{
        padding: 10px;
    }
    </style>
 </head>
  <body>
   @include('admin.header')
   @include('admin.sidebar')

   <div class="page-content">
    <div class="page-header">
      <div class="container-fluid">
        @include('_message')


        <table class="table-deg">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Room Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Wifi</th>
                    <th>Room Type</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($room as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->room_title }}</td>
                    <td>{{ Str::limit($room->description, 150) }}</td>                    <td>{{ $room->price }}</td>
                    <td>{{ $room->wifi }}</td>
                    <td>{{ $room->room_type }}</td>
                    <td>
                        <img src="{{ asset('room/images/'.$room->image) }}" alt="">
                    </td>
                    <td>
                        <a onclick="return confirm('Are You Sure Want To Delete?')" href="{{ url('delete_room',$room->id) }}">
                            <i style="font-size: 20px; margin-right:10px;" class="fas fa-trash-alt"></i>
                        </a>
                        <a href="{{ url('edit_room',$room->id) }}">
                              <i style="font-size: 20px;" class="fas fa-pen-square"></i>

                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>
      </div>
    </div>
 </div>

  @include('admin.footer')
  </body>
</html>
