@extends('layouts.backend')
 

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Explanation Update
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
						<h3 class="box-title">Explanation Update</h3>
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
					<form role="form" method="post" action="{{ url('/admin/explanation-edit') }}">
					  {{  csrf_field() }}
					  
						<input type="hidden" value="{{ $exp->id }}" name="exp_id" />
						<div class="box-body">      
						
							<div class="form-group">
								<label for="exampleInputEmail1">Explanation Type</label>
								<select class="form-control" name="type" >
									<option value="">-- Select Type --</option>
									@foreach($types as $t)
									@if($t->sname == $exp->type)
									<option value="{{ $t->sname }}" selected="selected">{{ $t->name }}</option>
									@else
									<option value="{{ $t->sname }}" >{{ $t->name }}</option>										
									@endif 	
									@endforeach										 
								</select>
							</div>
							
							
							<div class="form-group">
							  <label for="exampleInputEmail1">Explanation Title</label>
							  <input type="text" class="form-control" name="title" id="exampleInputEmail1" value="{{ $exp->title }}" placeholder="Enter Explanation Title">
							</div>
											
							<div class="form-group">
							  <label for="description">Explanation Description</label>
							  <textarea class="form-control" id="description" placeholder="Enter Explanation Detail" name="description">{{ $exp->explanation_detail }}</textarea>
							  <script type="text/javascript" >	 
                            	CKEDITOR.replace( 'description' );
                            </script>
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
  
@endsection	