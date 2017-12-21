@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bitcoin Related Video List
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
              <h3 class="box-title">Bitcoin Related Video List</h3>
            </div>
			
			
			<table id="bicoin_vdo_list_datatable" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Type</th>
				 	<th>Url</th>	
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
	var dataTable = $('#bicoin_vdo_list_datatable').DataTable({
		processing: true,
		serverSide: true,
		bSort: false,
		ajax: "{{ url('/admin/bitcoin-related-video-data-table') }}",
		columns: [			
			{ data: 'type', name: 'type' },			 
			{ data: 'id', name: 'name' },
		]
	});
});
</script>
  
  
  
@endsection	