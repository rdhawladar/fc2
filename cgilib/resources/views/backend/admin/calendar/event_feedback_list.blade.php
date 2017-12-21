@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Event Feedback List
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
              <h3 class="box-title">Event Feedback List</h3>
            </div>
			
			
			<table id="events_feedback_list_datatable" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Event Name</th>
				 	<th>Feedback By</th>					
				 	<th>Message</th>
				 	<th>Feedback</th>
					<th>Event Date</th>
					
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
	var dataTable = $('#events_feedback_list_datatable').DataTable({
		processing: true,
		serverSide: true,
		bSort: false,
		ajax: "{{ url('/admin/event-feedback-list-data-table') }}",
		columns: [			
			{ data: 'event_title', name: 'event_title' },
			{ data: 'name', name: 'name' },
			{ data: 'message', name: 'message' },
			{ data: 'vote_for', name: 'vote_for' },
			{ data: 'created_at', name: 'date' },
		]
	});
});
</script>
  
  
  
@endsection	