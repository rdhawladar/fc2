@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        URL Entry
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
						<h3 class="box-title">URL Entry</h3>
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
					<form role="form" method="post" action="{{ url('/admin/video-entry') }}">
					  {{  csrf_field() }}
						<div class="box-body">      
						
							<div class="form-group">
								<label for="exampleInputEmail1">User</label>
								<select class="form-control" name="user_id" >
									<option value="">-- Select User --</option>
									@foreach($users as $u)
									<option value="{{ $u->id }}">{{ $u->nick_name }}</option>
									@endforeach									 
								</select>
							</div>
							 
							
							<div class="form-group">
							  <label for="exampleInputEmail1">Date</label>
							  <input type="text" class="form-control" name="date" id="date" value="{{ old('date') }}" placeholder="Enter Date(yyyy-mm-dd)">
							</div>
                                                        
                            
                            <div class="form-group">
							  <label for="url1">URL 1</label>
							  <input type="text" class="form-control" name="url1" id="url1" value="{{ old('url1') }}" placeholder="Enter URL1">
							</div>
							
							<div class="form-group">
							  <label for="url2">URL 2</label>
							  <input type="text" class="form-control" name="url2" id="url2" value="{{ old('url2') }}" placeholder="Enter URL2">
							</div>
							
							
							 <div class="form-group">
							  <label for="url1">URL 3</label>
							  <input type="text" class="form-control" name="url3" id="url3" value="{{ old('url3') }}" placeholder="Enter URL1">
							</div>
							
							<div class="form-group">
							  <label for="url2">URL 4</label>
							  <input type="text" class="form-control" name="url4" id="url4" value="{{ old('url4') }}" placeholder="Enter URL2">
							</div>
							
							
							 <div class="form-group">
							  <label for="url1">URL 5</label>
							  <input type="text" class="form-control" name="url5" id="url5" value="{{ old('url5') }}" placeholder="Enter URL1">
							</div>
							
							<div class="form-group">
							  <label for="url2">URL 6</label>
							  <input type="text" class="form-control" name="url6" id="url6" value="{{ old('url6') }}" placeholder="Enter URL2">
							</div>
							
							
							 <div class="form-group">
							  <label for="url1">URL 7</label>
							  <input type="text" class="form-control" name="url7" id="url7" value="{{ old('url7') }}" placeholder="Enter URL1">
							</div>
							
							<div class="form-group">
							  <label for="url2">URL 8</label>
							  <input type="text" class="form-control" name="url8" id="url8" value="{{ old('url8') }}" placeholder="Enter URL2">
							</div>
								
							<div class="form-group">
							  <label for="url1">URL 9</label>
							  <input type="text" class="form-control" name="url9" id="url9" value="{{ old('url9') }}" placeholder="Enter URL9">
							</div>
							
							<div class="form-group">
							  <label for="url2">URL 10</label>
							  <input type="text" class="form-control" name="url10" id="url10" value="{{ old('url10') }}" placeholder="Enter URL10">
							</div>
								
							 
						</div>
						<!-- /.box-body -->

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