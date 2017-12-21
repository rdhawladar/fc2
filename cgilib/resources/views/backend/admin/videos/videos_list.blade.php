@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        URL List
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
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
		  
            <div class="box-header with-border">
              <h3 class="box-title">URL List</h3>
            </div>		
			
			<table id="vdo_list_datatable" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>User</th>
					<th>Date</th>
					<th>URL1</th>
					<th>URL2</th>
					<th>URL3</th>					
					<th>URL4</th>
				</tr>
			</thead>
			</table>
			
			
			
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        
      </div>	   
       
     

	  
	  
    </section>
    <!-- /.content -->
  
  
<!-- DataTables -->
<script src="{{ URL::asset('/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
$(function(){
	var dataTable = $('#vdo_list_datatable').DataTable({
		processing: true,
		serverSide: true,
		bSort: false,
		ajax: "{{ url('/admin/video-list-data-table') }}",
		columns: [
			{ data: 'nick_name', name: 'nick_name' },  
			{ data: 'sdate', name: 'sdate' },			
			{ data: 'url1', name: 'url1' },
			{ data: 'url2', name: 'url2' },
			{ data: 'url3', name: 'url3' },
			{ data: 'url4', name: 'url4' },
		]
	});
});
</script>
  
  
  
@endsection	