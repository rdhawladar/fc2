@extends('layouts.user_backend')
 

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Membership Power
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
            
                    
                    
                    
               
            
            </div>
             
        
          </div>
           
        </div>
         
    </div>
		
		
		
	
      <div class="row">
          
        @foreach($videos as $v)  
        <div class="col-md-3">
          <div class="box box-warning">
            <div class="box-header with-border">
              <p class="box-title">{{ $v->title }}</p>
            </div>
            <div class="box-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $v->vdo_id }}" allowfullscreen="" frameborder="0"></iframe>
                </div>                
            </div>
          </div>
        </div>
        @endforeach  
          
          
      </div>
	
	
 
	
	
	
		
		
		

	<div id="membership_feedbacks" class="row">
    </div>
    
    
    
                <div  class="modal modal-primary fade" id="modal-primary">
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
    

	<script>
		    $(function(){
		        
		        
	            function LoadFeedBacks()
	            {	        
    	          $.getJSON("http://localhost/crazysns/user/membership-power-feedback-list-json" ,function(data){
    	              //alert(data);
                        $('#membership_feedbacks').html('');
                        $('#membership_feedbacks').html(data.data);
		          });
	            }    
	            LoadFeedBacks();
	            
	            
	            $(document).on("change","input[type='radio']",function(){
		           var vl = $(this).val();
		           var feedback_id = $("#feedback_id").val();
		           
		           $.ajax({
                        type:'POST',
                        url: "http://localhost/crazysns/user/membership-power-make-poll",
                        data: { '_token': $('input[name="_token"]').val() , vote_for: vl , feedback_id : feedback_id },
                        headers: { 'X-CSRF-TOKEN' : $('input[name="_token"]').val() },
                        success: function(data) {
                            //LoadFeedBacks();
                            
                            if(data == 1) {   
                               if(vl=='yes'){
                                       
                                    $("#news_yes_vote"+feedback_id).text('+'+ parseInt($("#news_yes_vote"+feedback_id).text())+1   );
                                    $("#modal_feedback_id").val(feedback_id);
                                    $('#modal-primary').modal('show');
                                    
                                }else{
                                    $("#news_no_vote"+feedback_id).text('+'+ parseInt($("#news_no_vote"+feedback_id).text())+1   );
                                }
                            }
                            //alert(data);
                        }
                    });
		        }) ;
		        
		        
		        
		        $(document).on("submit","#user_request_form",function(e){
		            var feedback_id_ = $("#modal_feedback_id").val();
		            var name_ = $("#name").val();
		            var email_ = $("#email").val();
		            var message_ = $("#message").val();
		            if(name_ ==""){
		                alert("Enter Name");
		                $("#name").focus();
		                return false;
		            }else if(email_  == ""){
		                 alert("Enter Name");
		                $("#email").focus();
		                return false;
		            }else if(message_ == ""){
		                 alert("Enter Message");
		                $("#message").focus();
		                return false;
		            }else{
    		            $.ajax({
                            type:'POST',
                            url: "http://localhost/crazysns/user/membership-power-feedback-request-form",
                            data: { '_token': $('input[name="_token"]').val() , feedback_id: feedback_id_ , name: name_ , email : email_ , message: message_ },
                            headers: { 'X-CSRF-TOKEN' : $('input[name="_token"]').val() },
                            success: function(data) {
                                if(data == 1){
                                    alert('Thank you for your request!');
                                    
                                    $('#modal-primary').modal('hide');   
                                    //LoadFeedBacks();
                                }
                                //alert(data);
                            }
                        });
		            }  
		            return false;
		        });
		        
	            
	            
		    });      
		</script>

    
	  
	  
	  
	  
    </section>
    <!-- /.content -->
	
 	
@endsection	