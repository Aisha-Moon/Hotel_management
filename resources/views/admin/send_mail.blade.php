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

            <center>
                <h1 style="font-size: 30px; font-weight:bold;">Mail Send To {{ $message->name }}</h1>
                @include('_message')

                <form id="request" action="{{ url('mail',$message->id) }}" method="post"  class="main_form">
                    @csrf
                    <div class="row">
                       <div class="col-md-6">
                        <label for="">Greeting</label>
                          <input type="text" class="form-control" placeholder="Greeting" type="type" name="greeting" required>
                       </div>
                       <div class="col-md-6">
                        <label for="">Mail Body</label>
                          <textarea type="text" class="form-control" placeholder="Description"  name="mail_body" required></textarea>
                       </div>

                       <div class="col-md-6">
                        <label for="">Action Text</label>
                          <input type="text" class="form-control" placeholder="Action Text"  name="action_text" required>
                       </div>
                       <div class="col-md-6">
                        <label for="">Action Url</label>
                          <input type="text" class="form-control" placeholder="Action URL"  name="action_url" required>
                       </div>
                       <div class="col-md-6">
                        <label for="">End Line</label>
                          <input type="text" class="form-control" placeholder="End Line"  name="end_line" required>
                       </div>
                       <div class="col-md-12" style="padding-top: 10px;">
                          <button type="submit" class="send_btn btn btn-success btn-lg">Send</button>
                       </div>
                    </div>
                 </form>
            </center>
          </div>
        </div>
    </div>


   @include('admin.footer')
  </body>
</html>
