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
			
                    
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ url('/admin/url-entry') }}">
                    {{  csrf_field() }}
                    
                    
                    
                     <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                           <select class="form-control" name="user_id" >
									<option value="">-- Select User --</option>
								    @foreach($users as $u)
								    @if($u->id == old('user_id') )
									<option value="{{ $u->id }}" selected>{{ $u->nick_name }}</option>
									@else
									<option value="{{ $u->id }}">{{ $u->nick_name }}</option>
									@endif
									@endforeach									 
								</select>
                         
                      </div>
                      
                      
                      
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            
                          <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal2" name="date" placeholder="Date" aria-describedby="inputSuccess2Status2">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                              </div>  
                            </div>
                          </div>
                        </fieldset>
                      </div>
                  
                      
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                         <input   class="form-control" type="text"  name="url1" placeholder="URL1" id="url1" value="{{ old('url1') }}">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess5" name="url1_title" id="url1_title" value="{{ old('url1_title') }}" placeholder="URL1 Title">
                      </div>
                      
                      
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input  class="form-control col-md-7 col-xs-12"  type="text" placeholder="URL2"  name="url2" id="url2" value="{{ old('url2') }}">
                      </div>
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input  class="form-control col-md-7 col-xs-12"  type="text"  placeholder="URL2 Title"  name="url2_title" id="url2_title" value="{{ old('url2_title') }}">
                      </div>
                      
                      
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input   class="form-control col-md-7 col-xs-12"  type="text"  name="url3" placeholder="URL3" id="url3" value="{{ old('url3') }}">
                      </div>
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input   class="form-control col-md-7 col-xs-12"  type="text" placeholder="URL3 Title"  name="url3_title" id="url3_title" value="{{ old('url3_title') }}">
                      </div>
                      
                      
                      
                      
                      
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input   class="form-control col-md-7 col-xs-12" type="text"  name="url4" id="url4" placeholder="URL4" value="{{ old('url4') }}">
                      </div>
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input   class="form-control col-md-7 col-xs-12" type="text"  name="url4_title" id="url4_title" placeholder="URL4 Title" value="{{ old('url4_title') }}">
                      </div>
                      
                      
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input   class="form-control col-md-7 col-xs-12" type="text"  name="url5" id="url5" placeholder="URL5" value="{{ old('url5') }}">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input   class="form-control col-md-7 col-xs-12" type="text"  name="url5_title" id="url5_title" placeholder="URL5 Tittle" value="{{ old('url5_title') }}">
                      </div>
                      
                      
                      
                   
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input   class="form-control col-md-7 col-xs-12" type="text" name="url6" id="url6" placeholder="URL6" value="{{ old('url6') }}">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input   class="form-control col-md-7 col-xs-12" type="text" name="url6_title" id="url6_title" placeholder="URL6 Title" value="{{ old('url6_title') }}">
                      </div>
                      
                      
                       
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input  type="text" class="form-control col-md-7 col-xs-12" name="url7" id="url7" placeholder="URL7" value="{{ old('url7') }}">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input  type="text" class="form-control col-md-7 col-xs-12" name="url7_title" id="url7_title" placeholder="URL7 Title" value="{{ old('url7_title') }}">
                      </div>
                      
                      
                       
                       
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input type="text"  class="form-control col-md-7 col-xs-12" name="url8" id="url8" placeholder="URL8" value="{{ old('url8') }}">
                      </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input type="text"  class="form-control col-md-7 col-xs-12" name="url8_title" id="url8_title" placeholder="URL8 Title" value="{{ old('url8_title') }}">
                      </div>
                      
                      
                       
                       
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="url9" id="url9" placeholder="URL9" value="{{ old('url9') }}">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="url9_title" id="url9_title" placeholder="URL9 Title" value="{{ old('url9_title') }}">
                      </div>
                       
                       
                       
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input   class="form-control col-md-7 col-xs-12"   type="text" name="url10" id="url10" placeholder="URL10" value="{{ old('url10') }}" >
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input   class="form-control col-md-7 col-xs-12"   type="text" name="url10_title" id="url10_title" placeholder="URL10 Title" value="{{ old('url10_title') }}" >
                        </div>
                       
                  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-rounded btn-success">Submit</button>
                          <button class="btn btn-rounded btn-primary" type="button">Cancel</button>
				<!--		  <button class="btn btn-primary" type="reset">Reset</button>-->
                          
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