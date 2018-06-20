<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html lang="en" class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">``
        <![endif]-->
        <title> @yield('title') | Trim Wear Limited</title>
        @include('frontEnd.include.headerCss')

    </head>
       <?php 
      $url = $_SERVER['REQUEST_URI'];
      if ($url=='/contact') {
          echo '<body class="contact-bg">';
      }else{
        echo '<body>';
      }
      

       ?>
        
       
        <!-- Header-->
        @include('frontEnd.include.header')
        <!-- End header -->
        <!-- slider -->
       @yield('slider')
       <!-- end slider -->
        @yield('content')

       
       

        @include('frontEnd.include.footer')
        
        @include('frontEnd.include.footerJs')
        @yield('js')
    </body>
</html>