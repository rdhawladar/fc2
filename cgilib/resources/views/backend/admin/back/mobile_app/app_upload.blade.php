@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mobile Application Upload
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>	
	
	
    <!-- Main content -->
    <section class="content">

	
    

   

   
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
		  
            <div class="box-header with-border">
              <h3 class="box-title">Mobile Application Upload</h3>
            </div>
            <!-- /.box-header -->
			
			
			@if (count($errors) > 0)
			<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                {{ $errors->first() }} 
            </div>			
			@endif
			
			@if (Session::get('success'))
			<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                {{ Session::get('success') }}
              </div>	
			@endif
			
			
            <!-- form start -->
            <form role="form" method="post"  enctype="multipart/form-data" action="{{ url('/admin/mobile-app-upload') }}">
			  {{  csrf_field() }}
              <div class="box-body">
			  
			  
			  
				<div class="form-group">
                  <label for="exampleInputEmail1">Platform</label>
                  <select class="form-control" name="type" >
					<option value="">-- Select Platform --</option>
					<option value="Android">Android</option>
					<option value="IOS">IOS</option>
					<option value="Windows">Windows</option>					
				  </select>
                </div>

				<div class="form-group">
                  <label for="exampleInputEmail1">File</label>
                  <input type="file" class="form-control" name="file_name" id="exampleInputEmail1" >
                </div>				
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

       

        
 

        </div>
        <!--/.col (left) -->
        
      </div>	   
       
     

	  
	  
    </section>
    <!-- /.content -->
  
@endsection	