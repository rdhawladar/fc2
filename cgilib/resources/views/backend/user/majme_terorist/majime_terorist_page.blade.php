@extends('layouts.user_backend')
 

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Majime Terrorist
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

	
    

   

      <!-- =========================================================== -->

   
	<div class="row">        
        
        <div class="col-md-12">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $e->title }}</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              
            </div>
             
            <div class="box-body">
              {!! $e->explanation_detail !!}
            </div>
            
          </div>
           
        </div>
	</div>	
	
	
	
	
	
    
	 
	<div class="row">
	
		<style>
	    #chat_menu{
	        list-style:none;
	    }
	</style>
	
        <div class="col-md-12">
           
          <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Direct Chat</h3>

              <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="3 New Messages">3</span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts">
                  <i class="fa fa-comments"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body">
            
              <div class="direct-chat-messages">
                
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Alexander Pierce</span>
                    <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                  </div>
                   
                  <img class="direct-chat-img" src="{{ URL::asset('/assets/dist/img/user1-128x128.jpg') }}" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    Is this template really for free? That's unbelievable!
                  </div>
                   
                </div>
                 

                 
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right">Sarah Bullock</span>
                    <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                  </div>
                   
                  <img class="direct-chat-img" src="{{ URL::asset('/assets/dist/img/user3-128x128.jpg') }}" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    You better believe it!
                  </div>
                   
                </div>
                 
              </div>
               
               
              <div class="direct-chat-contacts">
                <ul class="contacts-list">
                  <li>
                    <a href="#">
                      <img class="contacts-list-img" src="{{ URL::asset('/assets/dist/img/user1-128x128.jpg') }}" alt="User Image">

                      <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Count Dracula
                              <small class="contacts-list-date pull-right">2/28/2015</small>
                            </span>
                        <span class="contacts-list-msg">How have you been? I was...</span>
                      </div>
                       
                    </a>
                  </li>
                   
                </ul>
                 
              </div>
               
            </div>
             
                      <div class="box-footer">
              <form action="#" method="post">
                <div style="width:100%;" id="tools">
                    <div style="float:left;">
                        <ul id="chat_menu">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="glyphicon glyphicon-user"></i> Up</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-user"></i> Down</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-user"></i> Left</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-user"></i> Right</a></li>
                            </ul>
                        </li>
                    </ul>

                    </div>
                    <div  style="float:left;">
                    <span id="send_file" class="glyphicon glyphicon-file"></span>
                    </div>
                    
                    
                </div>  
                <div class="input-group">
                    <input name="message" placeholder="Type Message ..." class="form-control" type="text">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat">Send</button>
                      </span>
                </div>
              </form>
            </div>
             
          </div>
           
        </div>
         

	 
    </div>
	
		
	

	<div class="row">
        
        <!-- right column -->
        <div class="col-md-12">
         
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Apply Request</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			
			
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
			
			
              <form class="form-horizontal" role="form" action="{{ url('/user/majime-terrorist-request') }}" method="post">
              
			  {{ csrf_field() }}

               <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control"  readonly name="name" placeholder="Enter Name" value="{{ \Auth::user()->first_name.' '. \Auth::user()->last_name }}"/>
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Qualification</label>

                    <div class="col-sm-8">
                      <select name="qualification" class="form-control"  >
					   <option>---Select Qualification---</option>
					   @foreach($q as $r)
					   <option value="{{ $r->qualification }}">{{ $r->qualification }}</option>
					   @endforeach
					  </select>
                    </div>
                  </div>
                
                  
                  
				  
				  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>

                
				
				
				 
            

              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      
      
      
      
      
      	<div class="row">            
            @foreach($vidoes as $v)    
            <div class="col-md-3">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">{{ $v->title }}</h3>
                </div>
                <div class="box-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $v->vdo_id }}" allowfullscreen="" frameborder="0"></iframe>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="pull-left">Query</span> <span class="pull-right"><i fa fa-comments></i></span></label>
                        <input class="form-control" id="exampleInputPassword1" placeholder="Enter your query for this video" type="text">
                    </div>
                </div>
              </div>
            </div>
            @endforeach    
      </div>
	



	

    <!-- =========================================================== -->

       
     

      



	  
	  
	  

	  
	  
	  
	  
	  
	  
    </section>
    <!-- /.content -->
	
 	
@endsection	