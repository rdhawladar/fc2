@extends('layouts.user_backend')
 

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        News & Events
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


		 <div class="col-md-7">
          <div class="box box-primary">
            <div class="box-body no-padding">
                
                
                <br/>
                
                <ul class="timeline">
		        @foreach( $calendar_events as $e) 
		        <li class="time-label"><span class="bg-red">{{ date("M,Y", strtotime($e->event_date)) }}</span></li>
			    <li>
			        <i class="fa  bg-blue">{{ date("d", strtotime($e->event_date)) }}</i>
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i>{{ date("H:i", strtotime($e->created_at))  }}</span>
                        <h3 class="timeline-header"><a href="{{ url('/user/calendar-detail/'. $e->id) }}">{{ $e->event_title }}</a> ...</h3>
                    </div>
                </li>    
		        @endforeach
		        </ul>
                
                
                
                
          
                <!-- <div id="load_calendar"></div> -->
                
            </div>
           </div>
         </div>  
		    
		 <div class="col-md-5">
          <div class="box box-primary">
            <div class="box-body no-padding">
				<br/>
			  	 
			  
        	    <ul id="business_idea_list" class="todo-list ui-sortable">
                @foreach($news_feeds as $n)
                <li>
                    <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <span class="text">{{  $n->title  }}'&nbsp;</span>
                </li>
                @endforeach
                </ul>
        
			  
			  
			  
			  <!-- <div id="load_news"></div> -->
			   
			<br/>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
		</div>
	 
 
    </section>
    <!-- /.content -->
    <script type="text/javascript">
	$(function(){
		/*$.getJSON("http://sbkmart.com/user/calendar-json",function(data){
			//alert(data.data);			$("#load_calendar").html(data.data);
		});	
		
		$.getJSON("http://sbkmart.com/user/news-event-list-json",function(data){
			//alert(data.data);
			$("#load_news").html(data.data);
		});*/
		
	});
	</script>
 	
@endsection	