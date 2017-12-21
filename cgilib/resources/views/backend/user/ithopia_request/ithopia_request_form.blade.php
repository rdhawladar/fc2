@extends('layouts.user_backend')
 

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ithopia Request
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

	
    

   

      <!-- =========================================================== -->

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
	
		<style>
	    #chat_menu{
	        list-style:none;
	    }
	</style>
	
        <div class="col-md-12">
           
          <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Direct Chat</h3>

              <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="3 New Messages">3</span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts">
                  <i class="fa fa-comments"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body">
            
             <link type="text/css" href="http://sbkmart.com/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">
                        <script type="text/javascript" src="http://sbkmart.com/cometchat/cometchatjs.php" charset="utf-8"></script>


                            <div id="cometchat_embed_synergy_container" style="width:100%;height:550px;max-width:100%;border:1px solid #CCCCCC;border-radius:5px;overflow:hidden;" ></div>
                            <script src="http://sbkmart.com/cometchat/js.php?type=core&name=embedcode" type="text/javascript"></script>
                            <script>
                                var iframeObj = {};
                                iframeObj.module="synergy";
                                iframeObj.style="width:100%;min-height:350px;min-width:600px;";
                                iframeObj.width="600px";
                                iframeObj.height="450px";
                                iframeObj.src="http://sbkmart.com/cometchat/cometchat_embedded.php"; 
                                if(typeof(addEmbedIframe)=="function"){
                                    addEmbedIframe(iframeObj);
                                }
                                </script>
               
            </div>
             
          
             
          </div>
           
        </div>
         
    </div>
	
		
		
		
	
	 
	
	
	
		
		
		
 
    
              

 
	  
	  
	  
    </section>
    <!-- /.content -->
	
 	
@endsection	