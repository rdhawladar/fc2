@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Business Idea List
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
              <h3 class="box-title">Business Idea List</h3>
            </div>
			
			
			<table id="business_idea_list_datatable" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Author</th>
					<th>Title</th>
				 	<th>Idea Detail</th>
				 	<th></th>
				</tr>
			</thead>
			</table>
			
			
			
          </div>

        </div>
        
      </div>	   
       
    </section>
    <!-- /.content -->
  
  
<!-- DataTables -->
<script src="{{ URL::asset('/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
$(function(){
	
	var dataTable = $('#business_idea_list_datatable').DataTable({
		processing: true,
		serverSide: true,
		bSort: false ,
		ajax: "{{ url('/admin/sample-business-idea-list-data-table') }}",
		columns: [			
			{ data: 'email', name: 'name' },
			{ data: 'title', name: 'title' },
			{ data: 'idea_detail', name: 'idea_detail' },
			 { data: 'id', name: 'id' },
		]
	});
	
});
</script>
  
  
  
@endsection	