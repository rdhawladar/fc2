@extends('layouts.user_backend')
 

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Members Profile
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
	          
	          
	    @foreach($users as $u)      
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ URL::asset('/assets/dist/img/profile/'. $u->profile_picture  ) }}" alt="User profile picture">



              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Name</b> <a class="pull-right">{{ $u->first_name }} {{ $u->last_name }}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{ $u->email }}</a>
                </li>
				<li class="list-group-item">
                  <b>Country</b> <a class="pull-right">{{ $u->country }}</a>
                </li>
			 
                <li class="list-group-item">
                  <b>Since</b> <a class="pull-right">{{ $u->created_at }}</a>
                </li>
              </ul>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

      
        </div>
        @endforeach
        
        
        
        
      </div>
   
       
     

      



	  
	  
	  

	  
	  
	  
	  
	  
	  
    </section>
    <!-- /.content -->
@endsection	