@extends('layouts.user_backend')
 

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Calendar Event Detail
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>

		<script>
		    $(function(){
		        
		        
		        function LoadPollCounter()
		        {
		            var news_id = $("#news_id").val();
		             $.getJSON("http://localhost/crazysns/user/event-polls/"+news_id ,function(data){
		                    $('#news_yes_vote').text('+'+data.yes);
                            $('#news_not_vote').text('+'+data.no);
			          });
		        }
		        
		        LoadPollCounter();
		        
		       $(document).on("change","input[type='radio']",function(){
		           var vl = $(this).val();
		           var news_id = $("#news_id").val();
		           
		           $.ajax({
                        type:'POST',
                        url: "http://localhost/crazysns/user/user/event-make-poll",
                        data: { '_token': $('input[name="_token"]').val() , vote_for: vl , news_id : news_id },
                        headers: { 'X-CSRF-TOKEN' : $('input[name="_token"]').val() },
                        success: function(data) {
                            if(data == 1) {   
                                LoadPollCounter();
                                if(vl=='yes'){
                                $('#modal-primary').modal('show');   
                                }
                            }
                            //alert(data);
                        }
                    });
		        }) ;
		        
		        
		        
		        $(document).on("submit","#user_request_form1",function(e){
		            var news_id_ = $("#news_id1").val();
		            var name_ = $("#name1").val();
		            var email_ = $("#email1").val();
		            var message_ = $("#message").val();
		            if(name_ ==""){
		                alert("Enter Name");
		                $("#name1").focus();
		                return false;
		            }else if(email_  == ""){
		                 alert("Enter Name");
		                $("#email1").focus();
		                return false;
		            }else if(message_ == ""){
		                 alert("Enter Message");
		                $("#message").focus();
		                return false;
		            }else{
    		            $.ajax({
                            type:'POST',
                            url: "http://localhost/crazysns/user/make-poll-request-form",
                            data: { '_token': $('input[name="_token"]').val() , news_id: news_id_ , name: name_ , email : email_ , message: message_ },
                            headers: { 'X-CSRF-TOKEN' : $('input[name="_token"]').val() },
                            success: function(data) {
                                if(data == 1){
                                    alert('Thank you for your request!');
                                    $('#modal-primary').modal('hide');   
                                }
                                //alert(data);
                            }
                        });
		            }  
		            return false;
		        });
		        
		    });
		</script>
	
	
    <!-- Main content -->
    <section class="content">
		<div class="row">
		 <div class="col-md-12">
          <div class="box box-primary">
         
            <div class="box-header with-border">
              <h3 class="box-title">{{ $e->event_title }}</h3>
            </div>
            <div class="box-body">
                <p>Date: {{ $e->event_date }}</p>
                <p>Details:</p>
                {!! $e->description !!}
            </div>    
         
             {{ csrf_field() }}
                
                <input type="hidden" name="news_id" id="news_id" value="{{ $e->id }}"/>
                <table style="margin-left:10px;" width="60%">
                   <tr>
                        <td width="90%" style="height:45px;background-color:#D8DFEA;border:1px solid #39579A;"><input style="margin-left:10px;" type="radio" name="comments" value="yes"/> Agree</td>
                        <td style="width:2px;">&nbsp;</td>
                        <td style="height:45px;background-color:#D8DFEA;border:1px solid #39579A;width:50px;" id="news_yes_vote">&nbsp;</td>
                   </tr>
                   <tr><td style="height:1px;" colspan="3">&nbsp;</td></tr>
                   <tr>
                        <td width="90%" style="height:45px;background-color:#D8DFEA;border:1px solid #39579A;"><input style="margin-left:10px;" type="radio" name="comments" value="no"/> Disagree</td>
                        <td style="width:2px;">&nbsp;</td>
                        <td style="height:45px;background-color:#D8DFEA;border:1px solid #39579A;width:50px;" id="news_not_vote">&nbsp;</td>
                   </tr>
                </table>
                <br/>
                
                
                
                <!-- user form  -->
                <div  class="modal modal-primary fade" id="modal-primary">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Your Information</h4>
                      </div>
                      <div class="modal-body">
                           
                           
                           
                  <form class="form-horizontal" method="post" id="user_request_form1" >
                  {{ csrf_field() }}    
                  <input type="hidden" name="news_id" id="news_id1" value="{{ $e->id }}"/>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control"  name="name" id="name1" readonly value="{{ \Auth::user()->first_name .' ' .\Auth::user()->last_name }}" placeholder="Enter Name" />
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-8">
                      <input type="email" name="email" class="form-control" id="email1" placeholder="Enter Email" readonly  value="{{ \Auth::user()->email }}"/>
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Message</label>

                    <div class="col-sm-8">
                      <textarea class="form-control" id="message1" name="message" id="inputExperience" placeholder="Your Message"></textarea>
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
                          <!--
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-outline">Save changes</button>
                        -->
                        
                      </div>
                    </div>
                  </div>
                </div>
                
                
             
          </div>
          <!-- /. box -->
        </div>
		</div>
	 
 
    </section>
    
 	
@endsection	