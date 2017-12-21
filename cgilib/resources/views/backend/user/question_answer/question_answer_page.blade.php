@extends('layouts.user_backend')
 

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Question & Answer
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
	
	
	
	
	
    <!--  ======================== Request Form ===================================================== -->
	<div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
           
            <div class="box box-primary">  
			    <br/>
            
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
					<h4><i class="icon fa fa-check"></i> Success!</h4>
					{{ Session::get('success') }}
				</div>					
    			@endif
              
                <form class="form-horizontal" method="post" action="{{ url('/user/question-answer-request-form') }}">
                  {{ csrf_field() }}    
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" readonly  name="name" placeholder="Enter Name" value="{{ \Auth::user()->first_name.' '. \Auth::user()->last_name }}"/>
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-8">
                      <input type="email" name="email" class="form-control" readonly placeholder="Enter Email"  value="{{ \Auth::user()->email }}"/>
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Message</label>

                    <div class="col-sm-8">
                      <textarea class="form-control" name="message" id="inputExperience" placeholder="Your Message">{{ old('message') }}</textarea>
                    </div>
                  </div>
				  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
				<br/>
				
				
			</div>	
				
				
				
               
		  
			</div> 
      </div>
    
 
	 
	
	
		<div class="row">
            
            @foreach($audios as $a)
            <div class="col-md-3">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">{{ $a->title }}</h3>
                </div>
                <div class="box-body">
                  <audio   controls="true" >
                    <source src="{{ $a->audio_url }}" >
                  </audio>          
                </div>
              </div>
            </div>
            @endforeach
            
            
        </div>
		
		
		
 
    
              

 
	  
	  
	  
    </section>
    <!-- /.content -->
	
 	
@endsection	