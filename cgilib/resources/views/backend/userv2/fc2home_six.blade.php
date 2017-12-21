@extends('backend.userv2.main_template')
 

@section('content')

  <link href="{{ URL::asset('/kachamal/css/green.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/kachamal/css/prettify.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/kachamal/css/select2.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/kachamal/css/switchery.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/kachamal/css/starrr.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/kachamal/css/green.css') }}" rel="stylesheet">

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
              
            <div class="clearfix"></div>
            
             
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Assigned Tasks <small>(FC2 System Members)</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    
                    
                     
                     @php 
                       $i = 1;
                       $ud = Auth::user()->id;
                       $date = date('Y-m-d');
                     @endphp
                       
                     
                    
                    
					@if(isset($downloadLinks[0])) 
                     <article class="media event">
                      <a class="pull-left date">
                        <p class="month">URL</p>
                        <p class="day">26</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="{{ url('/user/copy-url/'. $one['id'] .'/26') }}" target="_blank">{{ $one['title_url'] }}</a>
                        <p>{{ $one['url'] }}
                        </br>
                     {{ $downloadLinks[0] }}<br/>
                        	<form method="post" action="{{ url('/user/file-download') }}">
					            {{ csrf_field() }}
								<input type="hidden" name="url1" value="{{ $downloadLinks[0] }}"/>
								<input type="submit" class="btn btn-xs btn-primary" value="download"/>
								@if($one['status'] == 0)
								<a href="{{ url('/user/change-task-status/'.$ud.'/'.  $one['id'] .'/'.$date) }}" class="btn btn-xs btn-success">Done</a>
									@else
								<i class="fa fa-thumbs-o-up"></i>
								@endif
								    <a class="btn btn-xs btn-info" href="{{ url('/user/copy-url/'. $one['id'] .'/26') }}" target="_blank">Download Thumbnail</a>
                    
							</form>
                        </p>
                      </div>
                    </article> 
                    @endif
					
					
					
					
					@if(isset($downloadLinks[1])) 
                     <article class="media event">
                      <a class="pull-left date">
                        <p class="month">URL</p>
                        <p class="day">27</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="{{ url('/user/copy-url/'. $two['id'] .'/27') }}" target="_blank">{{ $two['title_url'] }}</a>
                        <p>{{ $two['url'] }}
                        </br>
                     {{ $downloadLinks[1] }}<br/>
                        	<form method="post" action="{{ url('/user/file-download') }}">
					            {{ csrf_field() }}
								<input type="hidden" name="url1" value="{{ $downloadLinks[1] }}"/>
								<input type="submit" class="btn btn-xs btn-primary" value="download"/>
								@if($two['status'] == 0)
								<a href="{{ url('/user/change-task-status/'.$ud.'/'. $two['id'] .'/'.$date) }}" class="btn btn-xs btn-success">Done</a>
									@else
								<i class="fa fa-thumbs-o-up"></i>
								@endif
								   <a class="btn btn-xs btn-info" href="{{ url('/user/copy-url/'. $two['id'] .'/27') }}" target="_blank">Download Thumbnail</a>
                     
							</form>
                        </p>
                      </div>
                    </article> 
                    @endif




					@if(isset($downloadLinks[2])) 
                     <article class="media event">
                      <a class="pull-left date">
                        <p class="month">URL</p>
                        <p class="day">28</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="{{ url('/user/copy-url/'. $three['id'] .'/28') }}" target="_blank">{{ $three['title_url'] }}</a>
                        <p>{{ $three['url'] }}
                        </br>
                     {{ $downloadLinks[2] }}<br/>
                        	<form method="post" action="{{ url('/user/file-download') }}">
					            {{ csrf_field() }}
								<input type="hidden" name="url1" value="{{ $downloadLinks[2] }}"/>
								<input type="submit" class="btn btn-xs btn-primary" value="download"/>
								@if($three['status'] == 0)
								<a href="{{ url('/user/change-task-status/'.$ud.'/'. $three['id'] .'/'.$date) }}" class="btn btn-xs btn-success">Done</a>
									@else
								<i class="fa fa-thumbs-o-up"></i>
								@endif
								   <a class="btn btn-xs btn-info" href="{{ url('/user/copy-url/'. $three['id'] .'/28') }}" target="_blank">Download Thumbnail</a>
                     
							</form>
                        </p>
                      </div>
                    </article> 
                    @endif	

				@if(isset($downloadLinks[3])) 
                     <article class="media event">
                      <a class="pull-left date">
                        <p class="month">URL</p>
                        <p class="day">29</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="{{ url('/user/copy-url/'. $four['id'] .'/29') }}" target="_blank">{{ $four['title_url'] }}</a>
                        <p>{{ $four['url'] }}
                        </br>
                     {{ $downloadLinks[3] }}<br/>
                        	<form method="post" action="{{ url('/user/file-download') }}">
					            {{ csrf_field() }}
								<input type="hidden" name="url1" value="{{ $downloadLinks[3] }}"/>
								<input type="submit" class="btn btn-xs btn-primary" value="download"/>
								@if($four['status'] == 0)
								<a href="{{ url('/user/change-task-status/'.$ud.'/' .  $four['id'] .'/'.$date) }}" class="btn btn-xs btn-success">Done</a>
									@else
								<i class="fa fa-thumbs-o-up"></i>
								@endif
								  <a class="btn btn-xs btn-info" href="{{ url('/user/copy-url/'. $four['id'] .'/29') }}" target="_blank">Download Thumbnail</a>
                      
							</form>
                        </p>
                      </div>
                    </article> 
                    @endif	
					

					
					@if(isset($downloadLinks[4])) 
                     <article class="media event">
                      <a class="pull-left date">
                        <p class="month">URL</p>
                        <p class="day">30</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="{{ url('/user/copy-url/'. $five['id'] .'/30') }}" target="_blank">{{ $five['title_url'] }}</a>
                        <p>{{ $five['url'] }}
                        </br>
                     {{ $downloadLinks[4] }}<br/>
                        	<form method="post" action="{{ url('/user/file-download') }}">
					            {{ csrf_field() }}
								<input type="hidden" name="url1" value="{{ $downloadLinks[4] }}"/>
								<input type="submit" class="btn btn-xs btn-primary" value="download"/>
								@if($five['status'] == 0)
								<a href="{{ url('/user/change-task-status/'.$ud.'/'. $five['id'] .'/'.$date) }}" class="btn btn-xs btn-success">Done</a>
									@else
								<i class="fa fa-thumbs-o-up"></i>
								@endif
								  <a class="btn btn-xs btn-info" href="{{ url('/user/copy-url/'. $five['id'] .'/30') }}" target="_blank">Download Thumbnail</a>
                      
							</form>
                        </p>
                      </div>
                    </article> 
                    @endif						
					
					
 					 
                </div>
                </div>
              </div>
        
        <style>
                    .pagei {
                    	list-style:none;
                    }
                    .pagei li{
                      display:inline;
                      padding:20px;
                    }
					</style>
        
			<p>
                    <ul class="pagei" >
					<li><a class="btn btn-xs btn-success" href="{{ url('/user/home') }}">1</a></li>
					<li><a class="btn btn-xs btn-success" href="{{ url('/user/home/two') }}">2</a></li>
                    <li><a class="btn btn-xs btn-success" href="{{ url('/user/home/three') }}">3</a></li>
                    <li><a class="btn btn-xs btn-success" href="{{ url('/user/home/four') }}">4</a></li>
			        <li><a class="btn btn-xs btn-success" href="{{ url('/user/home/five') }}">5</a></li>
                    <li><a class="btn btn-xs btn-danger" href="{{ url('/user/home/six') }}">6</a></li>
                    <li><a class="btn btn-xs btn-success" href="{{ url('/user/home/seven') }}">7</a></li>
                    <li><a class="btn btn-xs btn-success" href="{{ url('/user/home/eight') }}">8</a></li>
					 <li><a class="btn btn-xs btn-success" href="{{ url('/user/home/nine') }}">9</a></li>
				<li><a class="btn btn-xs btn-success" href="{{ url('/user/home/ten') }}">10</a></li>
				             
			  
					</ul>
			</p>
        
        
            </div>
            
            
            
            
            
             
            <div class="row">
                
              <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                  
                 
                <div class="x_title">
                  <h2>Message 01<small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                
                 
                <div class="x_content">
                  
                  <ul class="list-unstyled msg_list">
                    <li>
                      <a>
                        <span class="message">
                          {!! $msg1 !!}
                        </span>
                      </a>
                    </li>
                    
                    
            
                  </ul>
                  
                  
                </div>
              </div>
            </div>						  
            
            
              <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                  
                 
                <div class="x_title">
                  <h2>Message 02<small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                
                 
                <div class="x_content">
                  
                  <ul class="list-unstyled msg_list">
                    <li>
                      <a>
                        <span class="message">
                          {!! $msg2 !!}
                        </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>	   
            </div> 

          </div>
        </div>
        <!-- /page content -->
		
	   
    <!--  
    https://stackoverflow.com/questions/14149856/force-to-download-a-remote-file-via-curl-or-other-method    -->
     
 	
 	  <script src="{{ URL::asset('/kachamal/js/icheck.js') }}"></script>
    <script src="{{ URL::asset('/kachamal/js/hotkeys.js') }}"></script>
    <script src="{{ URL::asset('/kachamal/js/prettify.js') }}"></script>
    <script src="{{ URL::asset('/kachamal/js/jquery.tagsinput.js') }}"></script>
    <script src="{{ URL::asset('/kachamal/js/switchery.js') }}"></script>
    <script src="{{ URL::asset('/kachamal/js/select2.js') }}"></script>
    <script src="{{ URL::asset('/kachamal/js/parsley.js') }}"></script>
    <script src="{{ URL::asset('/kachamal/js/autosize.js') }}"></script>
    <script src="{{ URL::asset('/kachamal/js/jquery.autocomplete.min.js.js') }}"></script>
    <script src="{{ URL::asset('/kachamal/js/starrr.js') }}"></script>
 	
 	
@endsection	