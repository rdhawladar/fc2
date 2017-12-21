@extends('backend.adminv2.main_template')
 

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
              
              <!--
            <div class="page-title">
              <div class="title_left">
                <h3>Form Elements</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            -->
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>URL Entry <small>(FC2 System Member Registration)</small></h2>
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
                    <br />
                    
                   	@if (count($errors) > 0)
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i> Error!</h4>
						{{ $errors->first() }} 
					</div>			
					@endif
					
					
					@if (Session::get('error_message'))
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i> Error!</h4>
						{{ Session::get('error_message') }} 
					</div>			
					@endif
					
					@if (Session::get('success'))
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> Alert!</h4>
						{{ Session::get('success') }}
					  </div>	
					@endif
			
                  <span id="validationMessage"></span>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ url('/admin/url-entry-new') }}">
                    {{  csrf_field() }}
                    
                    
                    
                    
                      
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            
                          <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal2"  name="date" placeholder="Date" aria-describedby="inputSuccess2Status2">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                              </div>  
                            </div>
                          </div>
                        </fieldset>
                      </div>					  
					  
					   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                           <select class="form-control" id="user_id" name="user_id" >
							 	
							</select>                         
                      </div>
                      
                      
					  
                  
                    <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                    </div>  
                      
					  
					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url1" placeholder="URL1" id="url1" value="{{ old('url1') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url1_title" id="url1_title" value="{{ old('url1_title') }}" placeholder="URL1 Title">
				  </div>
                      
                      
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url2" placeholder="URL2" id="url2" value="{{ old('url2') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url2_title" id="url2_title" value="{{ old('url2_title') }}" placeholder="URL2 Title">
				  </div>
                         
                       
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url3" placeholder="URL3" id="url3" value="{{ old('url3') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url3_title" id="url3_title" value="{{ old('url3_title') }}" placeholder="URL3 Title">
				  </div>  
                      
                      
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url4" placeholder="URL4" id="url4" value="{{ old('url4') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url4_title" id="url4_title" value="{{ old('url4_title') }}" placeholder="URL4 Title">
				  </div>    
                       
                      
                   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url5" placeholder="URL5" id="url5" value="{{ old('url5') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url5_title" id="url5_title" value="{{ old('url5_title') }}" placeholder="URL5 Title">
				  </div>       
                      
                      
                 <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url6" placeholder="URL6" id="url6" value="{{ old('url6') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url6_title" id="url6_title" value="{{ old('url6_title') }}" placeholder="URL6 Title">
				  </div>        
                       
                       
                   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url7" placeholder="URL7" id="url7" value="{{ old('url7') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url7_title" id="url7_title" value="{{ old('url7_title') }}" placeholder="URL7 Title">
				  </div>        
                              
                   

					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url8" placeholder="URL8" id="url8" value="{{ old('url8') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url8_title" id="url8_title" value="{{ old('url8_title') }}" placeholder="URL8 Title">
				  </div>        
                        
				   
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url9" placeholder="URL9" id="url9" value="{{ old('url9') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url9_title" id="url9_title" value="{{ old('url9_title') }}" placeholder="URL9 Title">
				  </div>                      


				  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url10" placeholder="URL10" id="url10" value="{{ old('url10') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url10_title" id="url10_title" value="{{ old('url10_title') }}" placeholder="URL10 Title">
				  </div>   
				  
				   
				   
				  <!-- end 10 ---> 
				  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url11" placeholder="URL11" id="url11" value="{{ old('url11') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url11_title" id="url11_title" value="{{ old('url11_title') }}" placeholder="URL11 Title">
				  </div>
                      
                      
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url12" placeholder="URL12" id="url12" value="{{ old('url12') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url12_title" id="url12_title" value="{{ old('url12_title') }}" placeholder="URL12 Title">
				  </div>
                         
                       
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url13" placeholder="URL13" id="url13" value="{{ old('url13') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url13_title" id="url13_title" value="{{ old('url13_title') }}" placeholder="URL13 Title">
				  </div>  
                      
                      
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url14" placeholder="URL14" id="url14" value="{{ old('url14') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url14_title" id="url14_title" value="{{ old('url14_title') }}" placeholder="URL14 Title">
				  </div>    
                       
                      
                   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url15" placeholder="URL15" id="url15" value="{{ old('url15') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url15_title" id="url15_title" value="{{ old('url15_title') }}" placeholder="URL15 Title">
				  </div>       
                      
                      
                 <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url16" placeholder="URL16" id="url16" value="{{ old('url16') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url16_title" id="url16_title" value="{{ old('url16_title') }}" placeholder="URL16 Title">
				  </div>        
                       
                       
                   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url17" placeholder="URL17" id="url17" value="{{ old('url17') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url17_title" id="url17_title" value="{{ old('url17_title') }}" placeholder="URL17 Title">
				  </div>        
                              
                   

					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url18" placeholder="URL18" id="url18" value="{{ old('url18') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url18_title" id="url18_title" value="{{ old('url18_title') }}" placeholder="URL18 Title">
				  </div>        
                        
				   
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url19" placeholder="URL19" id="url19" value="{{ old('url19') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url19_title" id="url19_title" value="{{ old('url19_title') }}" placeholder="URL19 Title">
				  </div>                      


				  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url20" placeholder="URL20" id="url20" value="{{ old('url20') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url20_title" id="url20_title" value="{{ old('url20_title') }}" placeholder="URL20 Title">
				  </div>  

				  <!-- end 20 -->
				  
				  
				  
				  
				  
				    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url21" placeholder="URL21" id="url21" value="{{ old('url21') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url21_title" id="url21_title" value="{{ old('url21_title') }}" placeholder="URL21 Title">
				  </div>
                      
                      
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url22" placeholder="URL22" id="url22" value="{{ old('url22') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url22_title" id="url22_title" value="{{ old('url22_title') }}" placeholder="URL22 Title">
				  </div>
                         
                       
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url23" placeholder="URL23" id="url23" value="{{ old('url23') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url23_title" id="url23_title" value="{{ old('url23_title') }}" placeholder="URL23 Title">
				  </div>  
                      
                      
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url24" placeholder="URL24" id="url24" value="{{ old('url24') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url24_title" id="url24_title" value="{{ old('url24_title') }}" placeholder="URL24 Title">
				  </div>    
                       
                      
                   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url25" placeholder="URL25" id="url25" value="{{ old('url25') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url25_title" id="url25_title" value="{{ old('url25_title') }}" placeholder="URL25 Title">
				  </div>       
                      
                      
                 <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url26" placeholder="URL26" id="url26" value="{{ old('url26') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url26_title" id="url26_title" value="{{ old('url26_title') }}" placeholder="URL26 Title">
				  </div>        
                       
                       
                   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url27" placeholder="URL27" id="url27" value="{{ old('url27') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url27_title" id="url27_title" value="{{ old('url27_title') }}" placeholder="URL27 Title">
				  </div>        
                              
                   

					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url28" placeholder="URL28" id="url28" value="{{ old('url28') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url28_title" id="url28_title" value="{{ old('url28_title') }}" placeholder="URL28 Title">
				  </div>        
                        
				   
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url29" placeholder="URL29" id="url29" value="{{ old('url29') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url29_title" id="url29_title" value="{{ old('url29_title') }}" placeholder="URL29 Title">
				  </div>                      


				  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url30" placeholder="URL30" id="url30" value="{{ old('url30') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url30_title" id="url30_title" value="{{ old('url30_title') }}" placeholder="URL30 Title">
				  </div>  

				  <!-- end 30 -->
				  
				  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url31" placeholder="URL31" id="url31" value="{{ old('url31') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url31_title" id="url31_title" value="{{ old('url31_title') }}" placeholder="URL31 Title">
				  </div>
                      
                      
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url32" placeholder="URL32" id="url32" value="{{ old('url32') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url32_title" id="url32_title" value="{{ old('url32_title') }}" placeholder="URL32 Title">
				  </div>
                         
                       
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url33" placeholder="URL33" id="url33" value="{{ old('url33') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url33_title" id="url33_title" value="{{ old('url33_title') }}" placeholder="URL33 Title">
				  </div>  
                      
                      
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url34" placeholder="URL34" id="url34" value="{{ old('url34') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url34_title" id="url34_title" value="{{ old('url34_title') }}" placeholder="URL34 Title">
				  </div>    
                       
                      
                   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url35" placeholder="URL35" id="url35" value="{{ old('url35') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url35_title" id="url35_title" value="{{ old('url35_title') }}" placeholder="URL35 Title">
				  </div>       
                      
                      
                 <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url36" placeholder="URL36" id="url36" value="{{ old('url36') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url36_title" id="url36_title" value="{{ old('url36_title') }}" placeholder="URL36 Title">
				  </div>        
                       
                       
                   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url37" placeholder="URL37" id="url37" value="{{ old('url37') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url37_title" id="url37_title" value="{{ old('url37_title') }}" placeholder="URL37 Title">
				  </div>        
                              
                   

					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url38" placeholder="URL38" id="url38" value="{{ old('url38') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url38_title" id="url38_title" value="{{ old('url38_title') }}" placeholder="URL38 Title">
				  </div>        
                        
				   
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url39" placeholder="URL39" id="url39" value="{{ old('url39') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url39_title" id="url39_title" value="{{ old('url39_title') }}" placeholder="URL39 Title">
				  </div>                      


				  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url40" placeholder="URL40" id="url40" value="{{ old('url40') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url40_title" id="url40_title" value="{{ old('url40_title') }}" placeholder="URL40 Title">
				  </div>  

				  <!-- end 40 -->
				  
				  
				  
				  	  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url41" placeholder="URL41" id="url41" value="{{ old('url41') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url41_title" id="url41_title" value="{{ old('url41_title') }}" placeholder="URL41 Title">
				  </div>
                      
                      
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url42" placeholder="URL42" id="url42" value="{{ old('url42') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url42_title" id="url42_title" value="{{ old('url42_title') }}" placeholder="URL42 Title">
				  </div>
                         
                       
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url43" placeholder="URL43" id="url43" value="{{ old('url43') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url43_title" id="url43_title" value="{{ old('url43_title') }}" placeholder="URL43 Title">
				  </div>  
                      
                      
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url44" placeholder="URL44" id="url44" value="{{ old('url44') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url44_title" id="url44_title" value="{{ old('url44_title') }}" placeholder="URL44 Title">
				  </div>    
                       
                      
                   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url45" placeholder="URL45" id="url45" value="{{ old('url45') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url45_title" id="url45_title" value="{{ old('url45_title') }}" placeholder="URL45 Title">
				  </div>       
                      
                      
                 <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url46" placeholder="URL46" id="url46" value="{{ old('url46') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url46_title" id="url46_title" value="{{ old('url46_title') }}" placeholder="URL46 Title">
				  </div>        
                       
                       
                   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url47" placeholder="URL47" id="url47" value="{{ old('url47') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url47_title" id="url47_title" value="{{ old('url47_title') }}" placeholder="URL47 Title">
				  </div>        
                              
                   

					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url48" placeholder="URL48" id="url48" value="{{ old('url48') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url48_title" id="url48_title" value="{{ old('url48_title') }}" placeholder="URL48 Title">
				  </div>        
                        
				   
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url49" placeholder="URL49" id="url49" value="{{ old('url49') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url49_title" id="url49_title" value="{{ old('url49_title') }}" placeholder="URL49 Title">
				  </div>                      


				  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					 <input   class="form-control" type="text"  name="url50" placeholder="URL50" id="url50" value="{{ old('url50') }}">
				  </div>					  
				  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" name="url50_title" id="url50_title" value="{{ old('url50_title') }}" placeholder="URL50 Title">
				  </div>  
				  
				  
				  
				  

				  
				  
				   
				   
                  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-rounded btn-success">Submit</button>
                          <button class="btn btn-rounded btn-primary" type="button">Cancel</button>
 
                          
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

            
            



          </div>
        </div>
        <!-- /page content -->

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
@section('custom_script')

@endsection