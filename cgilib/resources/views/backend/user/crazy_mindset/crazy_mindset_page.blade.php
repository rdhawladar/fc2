@extends('layouts.user_backend')
 

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crazy Mindset
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
            <div class="col-md-12">
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">{{ $e->title }}</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  {!! $e->explanation_detail !!}
                </div>
              </div>
            </div>
    	</div>	


   
	   	<div class="row">
            @foreach($audios as $a)
            <div class="col-md-3">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">{{ $a->title }}</h3>
                </div>
                <div class="box-body">
                  <audio   controls="true" >
                    <source src="{{ $a->audio_url }}" >
                  </audio>          
                </div>
              </div>
            </div>
            @endforeach
        </div>
        
        
        
        
        
    <div class="row">
        @foreach($vidoes as $v)
        <div class="col-md-3">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $v->title }}</h3>
            </div>
            <div class="box-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $v->vdo_id }}" allowfullscreen="" frameborder="0"></iframe>
                </div>
				<div class="form-group">
				</div>
            </div>
          </div>
        </div>
        @endforeach
        
    </div>
        
        

<!-- =========================================================== -->


	  
    </section>
    <!-- /.content -->
	
 	
@endsection	