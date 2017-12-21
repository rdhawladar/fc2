@extends('layouts.backend')
 

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <h1>
        Advanced Form Elements
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
          <div class="box box-solid">
            
            <div class="box-body">
               
			   
			   
				<table align="center" border="0" cellpadding=5 cellspacing=5 style="width:100%;">
				<tr>
					<td align=center>Today : {{ $today }}</td>
				</tr>
				</table>
			   
			   
				<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:100%;border:1px solid #CCCCCC">
				<thead>
					<tr bgcolor="#EFEFEF">
						<td align=center><font color=red>Monday</font></td>
						<td align=center>Sunday</td>
						<td align=center>Tuesday</td>
						<td align=center>Wednesday</td>
						<td align=center>Thursday</td>
						<td align=center>Friday</td>
						<td align=center>Saturday</td>
					</tr>
				</thead>
				
				
				
				@for( $ds = 1 ; $ds <= $s ; $ds++ ) 
				<td style="font-family:arial;color:#B3D9FF;" align=center valign=middle bgcolor="#FFFFFF"></td>
				@endfor
				
				@for( $d = 1; $d <= $endDate ; $d++) 	
				
					@if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) 
					<tr>
					@endif					
					
					@php $fontColor="#000000" @endphp		
					
					@if ( date("D" , mktime (0,0,0,$month,$d,$year) ) == "Sun") 	 
					@php $fontColor="red" @endphp
					@endif 
				    
                    @if($d == $day)					
					<td style="font-family:arial;font-size:15px;color:#333333;height:100px;background-color:#eea236;text-decoration:underline;" align=center valign=middle><span style="color:{{ $fontColor }}"><a href="{{ url('/admin/calendar-set-event/'. $d.'-'.date('m-Y')   ) }}">{{ $d }}</a></span></td>
					@else
					<td style="font-family:arial;font-size:15px;color:#333333;height:100px;text-decoration:underline;" align=center valign=middle><span style="color:{{ $fontColor }}"><a href="{{ url('/admin/calendar-set-event/'. $d.'-'.date('m-Y') ) }}">{{ $d }}</a></span></td>					
					@endif 
					
					@if ( date("w" , mktime (0,0,0,$month,$d,$year)) == 6 ) 		 
					</tr> 
					@endif
				@endfor
				</table> 
				
				
				
				
				
		
            </div>
             
          </div>
        
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
		
		
		
     
 
	  
	  
	  

	  
	  
	  
	  
	  
	  
    </section>
    <!-- /.content -->
 
@endsection	