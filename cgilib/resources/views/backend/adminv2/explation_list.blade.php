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
                    <h2>Messages <small>(FC2 System Members Messages)</small></h2>
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







			
			
			<table id="explanation_list_datatable" class="table table-bordered table-striped">
			<thead>
				<tr>
					 
					<th>User</th>
					<th>Email</th>
					<th>Message1</th>
					<th>Message12</th>
					<th>&nbsp;</th> 
				</tr>
				
				@foreach($list as $l)
				<tr>
				    <td>{{ $l->nick_name }}</td>
				    <td>{{ $l->email }}</td>
				    <td>{!! $l->msg1 !!}</td>
				    <td>{!! $l->msg2 !!}</td>
				    <td><a class="label label-success" href="{{ url('/admin/message-edit/'. $l->id ) }}">Edit</a></td>
				</tr>
				@endforeach
				
				
			</thead>
			</table>
			
			
			
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
 

  
  
  
<!-- DataTables -->
<script src="{{ URL::asset('/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
$(function(){
	var dataTable = $('#explanation_list_datatable').DataTable({
		processing: true,
		serverSide: true,
		bSort: false,
		ajax: "{{ url('/admin/explanation-data-table') }}",
		columns: [			
			 
			{ data: 'id', name: 'user_name' },
			{ data: 'email', name: 'email' },
			{ data: 'msg1', name: 'msg1' },
			{ data: 'msg2', name: 'msg2' },
			 
		]
	});
});
</script>
  
  </div>
                </div>
              </div>
            </div>

            
            



          </div>
        </div>
        <!-- /page content -->


  
@endsection	
@section('custom_script')

@endsection