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

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            @include('_message')
            <table class="table-deg">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>


                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->phone }}</td>
                        <td>{{ $message->message }}</td>

                        <td>
                            <a href="{{ url('send_mail',$message->id) }}" class="btn btn-success">Send Mail</a>
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
