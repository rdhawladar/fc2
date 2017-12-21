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
              
            
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Scrap Data <small>(FC2 System Members)</small></h2>
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
					
					@if (Session::get('success'))
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> Alert!</h4>
						{{ Session::get('success') }}
					  </div>	
					@endif
			
                    
                    <form id="scrap-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ url('/admin/scrap-data') }}">
                    {{  csrf_field() }}
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_name">Site URL <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" id="site_url" name="site_url" placeholder="Site URL"/> 
                        </div>
                      </div>
                      
                  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" id="scrap_request" class="btn btn-success">Submit</button>
                          <button class="btn btn-primary" type="button">Cancel</button>
				           
                        </div>
                      </div>

                    </form>
                    
                    
                    
                    
                    
                    <br/>
                    <div id="show_scrap_data"></div>
                    
                    

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
<script>
        $(function(){
            $("#scrap-form2").submit(function(){
				
			
			
                var site_url = $("#site_url").val();
                if(site_url == "") 
                 $.ajax({
					type:'post' ,
					url: '{{ url("/admin/scrap-data") }}'
					data: 'site_url='+site_url ,
					success:function(data){
						$('#show_scrap_data').html(data);
					}
				 });
                return false;
            });
        });
    </script>
@endsection