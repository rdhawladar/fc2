@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Question & Answer Audio Upload
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
              <h3 class="box-title">Question & Answer Audio Upload</h3>
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
			
			
			
			<!--
			<audio controls="true">
			    <source src="http://indiamp3.com/audio/Indian%20Movies/Indian%20Movies%20Hindi%20Mp3%20Songs/Munna%20Michael%20(2017)/songs/Beat%20It%20Bijuriya%20@%20IndiaMp3.Com%20-%20Asses%20Kaur%20-%20Renesa%20Baadchi.mp3"/>
			</audio> 
			-->
			
			
            <!-- form start -->
            <form role="form" method="post"   action="{{ url('/admin/question-answer-entry') }}">
			  {{  csrf_field() }}
              <div class="box-body">
			  
				<div class="form-group">
                  <label for="exampleInputEmail1">Audio Title</label>
                  <input type="text" class="form-control" name="title" id="exampleInputEmail1" value="{{ old('title') }}" placeholder="Enter Audio Title">
                </div>

				<div class="form-group">
                  <label for="exampleInputEmail1">Audio File URL</label>
                  <input type="text" class="form-control" name="file_url" id="exampleInputEmail1" value="{{ old('file_url') }}" placeholder="Enter Audio File URL">
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