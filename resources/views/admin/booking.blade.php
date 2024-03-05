<!DOCTYPE html>
<html>
 <head>
    @include('admin.css')
    <style type="text/css">
        .table-deg{
            border:2px solid white;
            margin:auto;
            width:100%;
            text-align: center;
            margin-top: 50px;
        }
        th{
            background-color: skyblue;
            padding: 10px;
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
                    <th>Room ID</th>
                    <th>Room Title</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Arrival Date</th>
                    <th>Leaving Date</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                    <th>Update Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($booking as $data)
                <tr>
                   <td>{{ $data->room_id }}</td>
                   <td>{{ $data->room_name }}</td>
                   <td>{{ $data->name }}</td>
                   <td>{{ $data->email }}</td>
                   <td>{{ $data->phone }}</td>
                   <td>{{ $data->start_date }}</td>
                   <td>{{ $data->end_date }}</td>
                   <td>
                    @if($data->status=='Approved')
                    <span style="color:green;">Approved</span>
                    @elseif($data->status=='Rejected')
                    <span style="color:red;">Rejected</span>
                    @elseif ($data->status=='Waiting')
                    <span style="color:blue;">Waiting</span>
                    @endif

                </td>
                   <td>{{ $data->price }}</td>
                   <td>
                    <img src="/room/images/{{ $data->image }}" alt="">
                   </td>
                   <td>
                    <a onclick="return confirm('Are You Sure Want To Delete?')" href="{{ url('booking/delete',$data->id) }}" class="btn btn-danger">Delete</a>
                   </td>
                   <td style="padding-bottom: 10px;">
                    <a href="{{ url('approve_booking',$data->id) }}" class="btn btn-success">Approve</a>
                    <a href="{{ url('reject_booking',$data->id) }}" class="btn btn-danger">Reject</a>
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
