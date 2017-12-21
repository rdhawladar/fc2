@extends('layouts.user_backend')
 

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        News Detail
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
          <div class="box box-primary">
         
            <div class="box-header with-border">
              <h3 class="box-title">{{ $n->title }}</h3>
            </div>
            <div class="box-body">
                 
                {!! $n->description !!}
                
                <br/>
                {{ csrf_field() }}
                
                <input type="hidden" name="news_id" id="news_id" value="{{ $n->id }}"/>
                <table width="60%">
                   <tr>
                        <td width="90%" style="height:45px;background-color:#D8DFEA;border:1px solid #39579A;"><input type="radio" name="comments" value="yes"/> Agree</td>
                        <td style="width:2px;">&nbsp;</td>
                        <td style="height:45px;background-color:#D8DFEA;border:1px solid #39579A;width:50px;" id="news_yes_vote">&nbsp;</td>
                   </tr>
                   <tr><td style="height:1px;" colspan="3">&nbsp;</td></tr>
                   <tr>
                        <td width="90%" style="height:45px;background-color:#D8DFEA;border:1px solid #39579A;"><input type="radio" name="comments" value="no"/> Disagree</td>
                        <td style="width:2px;">&nbsp;</td>
                        <td style="height:45px;background-color:#D8DFEA;border:1px solid #39579A;width:50px;" id="news_not_vote">&nbsp;</td>
                   </tr>
                </table>
                
                
            </div>    
         
             
          </div>
          <!-- /. box 
          height:50px;background-color:#D8DFEA;border:1px solid #39579A;width:90%;
          -->
        </div>
		</div>
		
		<script>
		    $(function(){
		        
		        
		        function LoadPollCounter()
		        {
		            var news_id = $("#news_id").val();
		             $.getJSON("http://sbkmart.com/user/news-polls/"+news_id ,function(data){
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
                        url: "http://sbkmart.com/user/news-make-poll",
                        data: { '_token': $('input[name="_token"]').val() , vote_for: vl , news_id : news_id },
                        headers: { 'X-CSRF-TOKEN' : $('input[name="_token"]').val() },
                        success: function(data) {
                            if(data == 1) {   
                                LoadPollCounter();
                            }
                        }
                    });
		        }) ;
		        
		    });
		</script>
		
		
	 
 
    </section>
    
 	
@endsection	