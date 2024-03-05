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
     @include('home.slider')
      <!-- end banner -->
      <!-- about -->
      @include('home.about')

      <!-- end about -->
      <!-- our_room -->
      @include('home.room')

      <!-- end our_room -->
      <!-- gallery -->
      @include('home.gallery')

      <!-- end gallery -->
      <!-- blog -->

      <!-- end blog -->
      <!--  contact -->
      @include('home.contact')

      <!-- end contact -->
      <!--  footer -->
      @include('home.footer')

      <script type="text/javascript">
         // Store scroll position in sessionStorage when scrolling
         $(window).scroll(function () {
             sessionStorage.setItem('scrollTop', $(this).scrollTop());
         });

         // Restore scroll position from sessionStorage when the document is ready
         $(document).ready(function(){
             var scrollTop = sessionStorage.getItem('scrollTop');
             if (scrollTop !== null && !isNaN(scrollTop)) {
                 $(window).scrollTop(parseInt(scrollTop));
             }
         });
     </script>

    </script>
   </body>
</html>
