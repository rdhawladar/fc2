@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Audio Entry
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
						<h3 class="box-title">Audio Entry</h3>
					</div>
					<!-- /.box-header -->				
					
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
				
							
					<!-- form start -->
					<form role="form" method="post" action="{{ url('/admin/audios-entry') }}">
					  {{  csrf_field() }}
						<div class="box-body">      
						
							<div class="form-group">
								<label for="exampleInputEmail1">Content Page</label>
								<select class="form-control" name="content_page" >
									<option value="">-- Select Content Page --</option>
									@foreach($types as $t)
									<option value="{{ $t->sname }}">{{ $t->name }}</option>
									@endforeach									 
								</select>
							</div>						                          
                            
                            <div class="form-group">
								<label for="exampleInputEmail1">Audio Owner</label>
								<select class="form-control" name="audio_owner" id="audio_owner">
									<option value="">-- Select Audio Owner --</option>
									@foreach($users as $t)
									<option value="{{ $t->id }}">{{ $t->first_name.' '.$t->last_name }}</option>
									@endforeach									 
								</select>
							</div>
							
							<div class="form-group">
							  <label for="exampleInputEmail1">Audio Title</label>
							  <input type="text" class="form-control" name="audio_title" id="audio_title" value="{{ old('audio_title') }}" placeholder="Enter Audio Title">
							</div>                                                    
                            
                            <div class="form-group">
							  <label for="exampleInputEmail1">Audio URL</label>
							  <input type="text" class="form-control" name="audio_url" id="audio_url" value="{{ old('audio_url') }}" placeholder="Enter Audio ID">
							</div>											
							 
						</div>
						
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
					
				</div>
				<!-- /.box -->             
	 

			</div>
			<!--/.col (left) -->
			
		</div>	
	  
	  
    </section>
    <!-- /.content -->
    <script>
        $(function(){
            $(document).on("change" , "#reference" , function() {
                var reference = $("#reference").val();
                if(reference == "") {
                    $("#vdo_owner").html('');
                    alert('Please select reference');
                }else{
                    $.ajax({
                        type:'POST',
                        url: "http://localhost/crazysns/admin/video-owners-list",
                        data: { '_token': $('input[name="_token"]').val() , reference: reference },
                        headers: { 'X-CSRF-TOKEN' : $('input[name="_token"]').val() },
                        success: function(data) {
//                             alert(data);    
                            $("#vdo_owner").html('');
                            $("#vdo_owner").html(data);
                        }
                    });                    
                }
                //vdo_owner
                //alert(reference);
            });
        });
    </script>  
      
  
@endsection	