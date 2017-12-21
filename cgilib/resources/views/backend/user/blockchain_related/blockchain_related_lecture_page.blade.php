@extends('layouts.user_backend')
 

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blockchain Related Lecture
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
					<input class="btn btn-info" id="comment_for_this_video"  value="Submit Your Comment For This Video"  type="button">
				</div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      


                   <div  class="modal modal-primary fade" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Your Information</h4>
                      </div>
                      <div class="modal-body">
                           
                  <form class="form-horizontal" method="post" id="user_request_form" >
                        {{ csrf_field()  }}
                  <input type="hidden" name="feedback_id" id="modal_feedback_id" />
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control"  name="name" id="name" value="{{ \Auth::user()->first_name .' '. \Auth::user()->last_name }}" readonly placeholder="Enter Name" />
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                      <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" readonly value="{{ \Auth()->user()->email }}" />
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Message</label>

                    <div class="col-sm-8">
                      <textarea class="form-control" id="message" name="message" id="inputExperience" placeholder="Your Message"></textarea>
                    </div>
                  </div>
				  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                      <button type="submit"  class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                    </form>
                           
                      </div>
                      <div class="modal-footer">
                        
                      </div>
                    </div>
                  </div>
                </div>

      <!-- =========================================================== -->

   
	
	
    
	 
 
		
	

	 <script>
	     $(function(){
	        $(document).on("click","#comment_for_this_video",function(){
	            $("#myModal").modal("show");
	        }); 
	     });
	 </script>
 
	
 
	  
	  
	  
	  
    </section>
    <!-- /.content -->
	
 	
@endsection	