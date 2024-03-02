<!DOCTYPE html>
<html lang="en">
   <head>

    <base href="/public">
    @include('home.css')
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
    
         <!-- header inner -->
        <header>
            @include('home.header')
        </header>


<div  class="our_room">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Our Room</h2>
                <p>Lorem Ipsum available, but the majority have suffered </p>
             </div>
          </div>
       </div>

       <div class="row">
       
        <div class="col-md-8 ">
         <div id="serv_hover"  class="room">
            <div class="room_img" style="padding: 20px;">
               <figure><img style="height:300px;width:750px;" src="{{ asset('room/images/'.$room->image) }}" alt="#"/></figure>
            </div>
            <div class="bed_room">
               <h3>{{ $room->room_title }}</h3>
               <p style="padding: 10px;">{{ $room->description }}</p>
               <h4 style="padding: 10px;">Free Wifi : {{ $room->wifi }}</h4>
               <h4 style="padding: 10px;">Room Type : {{ $room->room_type }}</h4>
               <h3 style="padding: 10px;">Room Price : {{ $room->room_price }}</h3>
            </div>
         </div>
      </div>

      <div class="col-md-4">
        <h1 style="font-size: 25px;" class="fw-bold">Book This Room</h1>
        @include('_message')

<form action="{{ url('add_booking',$room->id) }}" method="post">
    @csrf

        <div>
            <label for="">Name</label>
            <input type="text" name="name" @if(Auth::id()) value="{{ Auth::user()->name }}" @endif class="form-control">
        </div>
        <div>
            <label for="">Email</label>
            <input type="text" name="email" @if(Auth::id()) value="{{ Auth::user()->email }}" @endif class="form-control">
        </div>
        <div>
            <label for="">Phone</label>
            <input type="text" name="phone" @if(Auth::id()) value="{{ Auth::user()->phone }}" @endif class="form-control">
        </div>
        <div>
            <label for="">Start Date</label>
            <input type="date" name="startDate" value="{{ old('startDate') }}" id="startDate" class="form-control">
            <span style="color:red;">{{ $errors->first('startDate') }}</span>

        </div>
        <div>
            <label for="">End Date</label>
            <input type="date" name="endDate" id="endDate" class="form-control">
            <span style="color:red;">{{ $errors->first('endDate') }}</span>

        </div>
        <div style="padding: 10px;">
            <input type="submit" class="btn btn-primary" value="Book Room">
        </div>

    </form>
      </div>

       </div>

    </div>
 </div>


      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
    
      <!-- end contact -->
      <!--  footer -->
      @include('home.footer')
      <script type="text/javascript">
      $(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;

    var day = dtToday.getDate();

    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();

    if(day < 10)
     day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('#startDate').attr('min', maxDate);
    $('#endDate').attr('min', maxDate);

});
    </script>

   </body>
</html>
