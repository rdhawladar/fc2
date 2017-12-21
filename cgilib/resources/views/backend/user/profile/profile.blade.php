@extends('layouts.user_backend')
 

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Your Profile
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
        <div class="col-md-3">
       

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ URL::asset('/assets/dist/img/profile/'. \Auth::user()->profile_picture  ) }}" alt="User profile picture">



              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Name</b> <a class="pull-right">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{ Auth::user()->email }}</a>
                </li>
				<li class="list-group-item">
                  <b>Country</b> <a class="pull-right">{{ Auth::user()->country }}</a>
                </li>
				<li class="list-group-item">
                  <b>Skype</b> <a class="pull-right">{{ Auth::user()->skype }}</a>
                </li>
				<li class="list-group-item">
                  <b>Phone</b> <a class="pull-right">{{ Auth::user()->phone }}</a>
                </li>
				<li class="list-group-item">
                  <b>Facebook</b> <a class="pull-right">{{ Auth::user()->facebook }}</a>
                </li>
                <li class="list-group-item">
                  <b>Since</b> <a class="pull-right">{{ Auth::user()->created_at }}</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

      
        </div>
        <!-- /.col -->
        <div class="col-md-9">
        
        <!--
        <p><b>Online Users: [
        @foreach($online_users as $ou)
         {{ $ou->first_name." ".$ou->last_name }},
        @endforeach
        ]</b>
        </p>
        -->
        
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">            
              <li class="active"><a href="#basic_info" data-toggle="tab">Update Basic Info</a></li>
			  <li ><a href="#additional_info" data-toggle="tab">Update Additional Info</a></li>
			  <li ><a href="#change_picture" data-toggle="tab">Change Picture</a></li>			  
			  <li ><a href="#change_password" data-toggle="tab">Change Password</a></li>
            </ul>
			
			
            <div class="tab-content">
              
			  
		 

				<div class="active tab-pane" id="basic_info">
                <form class="form-horizontal" method="post" action="{{ url('/user/self-introduce-basic-info') }}">
                    {{ csrf_field() }}
                    
                    
                 <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}"/>    
				 
				 
				 
				 
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">First Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="first_name" id="inputName" value="{{ \Auth::user()->first_name }}" placeholder="First Name">
                    </div>
                  </div>
				  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Last Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="last_name" id="inputName" value="{{ \Auth::user()->last_name }}" placeholder="Last Name">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" name="email" value="{{ \Auth::user()->email }}" placeholder="Email">
                    </div>
                  </div>
                   
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Country</label>

                    <div class="col-sm-10">
                      <select class="form-control" name="country" >
						<option value="">---Choose Country---</option>
						@foreach($countries as $c)
							@if( \Auth::user()->country == $c->country )
							<option value="{{ $c->country }}" selected="selected">{{ $c->country }}</option>
							@else
							<option value="{{ $c->country }}">{{ $c->country }}</option>
							@endif
						@endforeach
					  </select>
                    </div>
                  </div>
				  
                 
				 
				  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Present Address</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" name="present_address" id="inputName" placeholder="Present Address">{{ \Auth::user()->present_address }}</textarea>
                    </div>
                  </div>
				  

				  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Permanent Address</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" name="parmanent_address" id="inputName" placeholder="Permanent Address">{{ \Auth::user()->parmanent_address }}</textarea>
                    </div>
                  </div>

				  
				  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="phone" id="inputName" value="{{ \Auth::user()->phone }}" placeholder="Phone">
                    </div>
                  </div>
				  
				 
				  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Skype</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="skype_id" id="inputName" value="{{ \Auth::user()->skype }}" placeholder="Skype ID">
                    </div>
                  </div>
				  
				  
				  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Facebook</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="fb_id" id="inputName" value="{{ \Auth::user()->facebook }}" placeholder="Facebook ID">
                    </div>
                  </div>
                  
                 
                
                  
                 
				 
                 
                 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
			  
			  
			  
            <!-- /.tab-pane -->
            <div class="tab-pane" id="additional_info">
                <form class="form-horizontal" method="post" action="{{ url('/user/self-introduce-additional-info') }}">
                    {{ csrf_field() }}
                    
                    
					<input type="hidden" name="user_id" value="{{ \Auth::user()->id }}"/>    
					 
					<div class="form-group">
						<label for="inputEmail" class="col-sm-2 control-label">Hobby</label>

						<div class="col-sm-10">
						  <input type="text" class="form-control" id="inputEmail" name="hobby" value="{{ \Auth::user()->hobby }}" placeholder="Hobby">
						</div>
					</div>
					  
					  
					<div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">Profession</label>

						<div class="col-sm-10">
						  <input type="text" class="form-control" name="profession" id="inputName" value="{{ \Auth::user()->profession }}" placeholder="Profession">
						</div>
					</div>				  
					  
					<div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">About Yourself</label>

						<div class="col-sm-10">
						  <textarea class="form-control" name="about_yourself" id="inputName" placeholder="About Yourself">{{ \Auth::user()->about_yourself }}</textarea>
						</div>
					</div>
					 
					 
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" class="btn btn-danger">Submit</button>
						</div>
					</div>
				
                </form>
            </div>
            <!-- /.tab-pane -->				  
			  
			  
			  
			  
              <!-- /.tab-pane -->
            <div class="tab-pane" id="change_picture">
                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ url('/user/self-introduce-change-profile-picture') }}">
                    {{ csrf_field() }}
					<input type="hidden" name="user_id" value="{{ \Auth::user()->id }}"/>    
				 				   
					<div class="form-group">
						<label for="inputEmail" class="col-sm-2 control-label">Upload Your Profile Photo</label>

						<div class="col-sm-10">
							<input type="file" class="form-control"   name="profile_photo" >
						</div>
					</div>                 
                 
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-danger">Submit</button>
						</div>
					</div>					
                </form>
            </div>
            <!-- /.tab-pane -->			  
			  
			  
			  
			   <!-- /.tab-pane -->
              <div class="tab-pane" id="change_password">
                <form class="form-horizontal" method="post" action="{{ url('/user/self-introduce-change-password') }}">
                    {{ csrf_field() }}
                    
                    
                 <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}"/>    
				 
				    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Old Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="old_password" id="inputName" value="{{ \Auth::user()->readable_password }}" placeholder="Old Password">
                    </div>
                  </div>
				  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">New Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="new_password" id="inputName"  placeholder="New Password">
                    </div>
                  </div>
                  
                  
                 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->	
			  
			  
			  
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
   
       
     

      



	  
	  
	  

	  
	  
	  
	  
	  
	  
    </section>
    <!-- /.content -->
@endsection	