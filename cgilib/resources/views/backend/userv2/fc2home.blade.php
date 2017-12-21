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
                       
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">URL</p>
                        <p class="day">1</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="{{ url('/user/copy-url/'. $rowid .'/1') }}" target="_blank">{{ $urls['url1_title'] }}</a>
                        <p>{{ $urls['url1'] }}
                        </br>
                        @if(isset($downloadLinks[0]))
                        	{{ $downloadLinks[0] }}<br/>                        
                        	<form method="post" action="{{ url('/user/file-download') }}">
					            {{ csrf_field() }}                                 
								<input type="hidden" name="url1" value="{{ $downloadLinks[0] }}"/>                                 
								<input type="submit" class="btn btn-xs btn-primary" value="download"/>
								@if($urls->dl_status1 == 0)
								<a href="{{ url('/user/change-task-status/'.$ud.'/1/'.$date) }}" class="btn btn-xs btn-success">Done</a>
								@else
								<i class="fa fa-thumbs-o-up"></i>
								@endif
							</form>
                         @endif
                        </p>
                      </div>
                    </article>
                    
                     
                    @if(isset($downloadLinks[1]))
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">URL</p>
                        <p class="day">2</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="{{ url('/user/copy-url/'. $urls['id'] .'/2') }}" target="_blank">{{ $urls['url2_title'] }}</a>
                        <p>{{ $urls['url2'] }}
                        </br>
                    
                    {{ $downloadLinks[1] }}<br/>
                        	<form method="post" action="{{ url('/user/file-download') }}">
					            {{ csrf_field() }}
								<input type="hidden" name="url1" value="{{ $downloadLinks[1] }}"/>
								<input type="submit" class="btn btn-xs btn-primary" value="download"/>
								@if($urls->dl_status2 == 0)
							<a href="{{ url('/user/change-task-status/'.$ud.'/2/'.$date) }}" class="btn btn-xs btn-success">Done</a>
								@else
								<i class="fa fa-thumbs-o-up"></i>
								@endif
							</form>
                       
                        </p>
                      </div>
                    </article>  
           @endif
                    
                    
                   @if(isset($downloadLinks[2])) 
                <article class="media event">
                      <a class="pull-left date">
                        <p class="month">URL</p>
                        <p class="day">3</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="{{ url('/user/copy-url/'. $urls['id'] .'/3') }}" target="_blank">{{ $urls['url3_title'] }}</a>
                        <p>{{ $urls['url3'] }}                        
                        </br>
                 
                    {{ $downloadLinks[2] }}<br/>                 
                        	<form method="post" action="{{ url('/user/file-download') }}">
					            {{ csrf_field() }}
								<input type="hidden" name="url1" value="{{ $downloadLinks[2] }}"/>
								<input type="submit" class="btn btn-xs btn-primary" value="download"/>
								
								@if($urls->dl_status3 == 0)
								<a href="{{ url('/user/change-task-status/'.$ud.'/3/'.$date) }}" class="btn btn-xs btn-success">Done</a>
									@else
								<i class="fa fa-thumbs-o-up"></i>
								@endif
							</form>
                 
                        </p>
                      </div>
                    </article>   
					@endif
                    
              
 					 
		
		
					 
		
			 
			 	 
                    
                    
                   
                    
                    
                    
                    
                    
					 
 					 
					<style>
                    .pagei {
                    	list-style:none;
                    }
                    .pagei li{
                      display:inline;
                      padding:20px;
                    }
					</style>

					

                </div>
                </div>
              </div>
			<p>
                    <ul class="pagei" >
                    <li><a class="btn btn-xs btn-danger" href="{{ url('/user/home') }}">1</a></li>
                    <li><a class="btn btn-xs btn-success" href="{{ url('/user/home/two') }}">2</a></li>
                    <li><a class="btn btn-xs btn-success" href="{{ url('/user/home/three') }}">3</a></li>
                    <li><a class="btn btn-xs btn-success" href="{{ url('/user/home/four') }}">4</a></li>
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