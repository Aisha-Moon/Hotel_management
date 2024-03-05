<!DOCTYPE html>
<html lang="en">
   <head>
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
         @include('home.header')


      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->


      <!-- end about -->
      <!-- our_room -->
      @include('home.room')

      <!-- end our_room -->
      <!-- gallery -->

      <!-- end contact -->
      <!--  footer -->
      @include('home.footer')

    

    </script>
   </body>
</html>
