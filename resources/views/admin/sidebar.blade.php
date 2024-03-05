<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ url('admin') }}/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
          <h1 class="h5">Mark Stephen</h1>
          <p>Web Designer</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
              <li class="@if(Request::segment(1)=='/home') @else active @endif"><a href="{{ url('/home') }}"> <i class="icon-home"></i>Home </a></li>
              <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse">
                <i class="icon-windows"></i>Hotel Room </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{ url('create_room') }}">Add Room</a></li>
                  <li><a href="{{ url('view_room') }}">View Rooms</a></li>
                  <li><a href="#">Page</a></li>
                </ul>
              </li>
              <li class="@if(Request::segment(1)=='bookings') @else active @endif"><a href="{{ url('bookings') }}"> <i class="icon-home"></i>Bookings </a></li>
              <li class="@if(Request::segment(1)=='view_gallery') @else active @endif"><a href="{{ url('view_gallery') }}"> <i class="icon-home"></i>Gallery </a></li>
              <li class="@if(Request::segment(1)=='message') @else active @endif"><a href="{{ url('message') }}"> <i class="icon-home"></i>Message</a></li>


      </ul>
    </nav>
