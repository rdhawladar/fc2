
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>::FC2System Admin ::</title>

    <link href="{{ URL::asset('/kachamal/css/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/kachamal/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/kachamal/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/kachamal/css/nprogress.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/kachamal/css/custom.min.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
      <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>FC2System!</span></a>
            </div>

            <div class="clearfix"></div>

            @include('backend.adminv2.left_menu')  


          </div>
        </div>


    @include('backend.adminv2.top_bar') 
    
    @yield('content')
 

        <!-- footer content -->
        <footer>
          <div class="pull-right">
             <a href="#">FC2System</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ URL::asset('/kachamal/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('/kachamal/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('/kachamal/js/fastclick.js') }}"></script>
    <script src="{{ URL::asset('/kachamal/js/nprogress.js') }}"></script>
    <script src="{{ URL::asset('/kachamal/js/date.js') }}"></script>
    <script src="{{ URL::asset('/kachamal/js/moment.min.js') }}"></script>
    <script src="{{ URL::asset('/kachamal/js/daterangepicker.js') }}"></script>
    <script src="{{ URL::asset('/kachamal/js/custom.js') }}"></script>
	
	
	@yield('custom_script')
    
  </body>
</html>



