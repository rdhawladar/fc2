@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Custom Member Registration
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
              <h3 class="box-title">Custom Member Registration</h3>
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
            <form role="form" method="post" action="{{ url('/admin/custom-members-registration') }}">
			  {{  csrf_field() }}
              <div class="box-body">
				<div class="form-group">
                  <label for="exampleInputEmail1">Member Name</label>
                  <select class="form-control" name="user_id" >
                      <option>-- Select Member --</option>
                      @foreach($users as $u)
                      <option value="{{ $u->id }}">{{ $u->first_name.' '.$u->last_name }}</option>
                      @endforeach
                  </select>      
                </div>
 
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" class="form-control" name="password" id="exampleInputEmail1" value="{{ old('password') }}" placeholder="Enter Member Password">
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