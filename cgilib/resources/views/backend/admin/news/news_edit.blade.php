@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        News Entry
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
              <h3 class="box-title">Entry Entry</h3>
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
            <form role="form" method="post" action="{{ url('/admin/news-edit-action') }}">
			  {{  csrf_field() }}
			  
			  <input type="hidden" name="news_id" value="{{ $id }}"/>
			  
			  
              <div class="box-body">
                  
                <div class="form-group">
                  <label for="exampleInputEmail1">News Title</label>
                  <input type="text" class="form-control" name="title" id="exampleInputEmail1" value="{{ $news->title }}" placeholder="Enter News Title">
                </div>  
                  
				<div class="form-group">
                  <label for="detail">News Detail </label>
                  <textarea class="form-control" name="detail" id="detail"   placeholder="Enter News Detail">{!! $news->description !!}</textarea>
                  <script type="text/javascript" >	 
                    CKEDITOR.replace( 'detail' );
                  </script>
                </div>
                
               
              </div>
               

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