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
                    <h2>User Job List <small>(FC2 System Member Registration)</small></h2>
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
                    
 
 
			
			@if( count($data) >0 )
                  <p>Data From:{{ date('d M,Y', strtotime($end)) }}  To  {{ date('d M,Y', strtotime($start)) }}</p>
			<table id="members_list_datatable" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Email</th>
					<th>Password</th>
					<th>Date</th>
					<th>URL</th>
					<th>Status</th> 		 
				</tr>
			</thead>
			<tbody>
			 @foreach($data as  $d)
				<tr>
					<td>{{ $d->email }}</td>
					<td>{{ $d->readable_password }}</td>
					<td>{{ $d->sdate }}</td>
					<td>{{ $d->url_no }}: {{ $d->url }}</td>
					<td>{{ $d->status }}</td>					 		 
				</tr>
				@endforeach				
			</tbody>
			</table>
			@endif
			
		 
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
 
  


 </div>
                </div>
              </div>
            </div>

            
            



          </div>
        </div>
        <!-- /page content -->


  
  
  
@endsection	
 