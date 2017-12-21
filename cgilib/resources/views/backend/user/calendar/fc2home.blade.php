@extends('layouts.user_backend')
 

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Assigned Tasks
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
          <div class="box box-primary">
            <div class="box-body no-padding">
				<br/>
				<table align="center">
					<tr><td>User Name:</td><td>&nbsp;&nbsp; {{ Auth::user()->nick_name }}</td></tr>
					<tr><td>Email:</td><td>&nbsp;&nbsp; {{ Auth::user()->email }}</td></tr>
					<tr><td>Fc2Password:</td><td>&nbsp;&nbsp; {{ Auth::user()->readable_password }}</td></tr>
				</table>
			    <br/>
        	    <ul id="business_idea_list" class="todo-list ui-sortable">
                @foreach($urls as $n)
                <li>
                    
                    <span class="text">
					<table>
					<tr>
					   <td>1. {{  $n->url1  }}   </td>
					   <td><form method="post" action="{{ url('/file-download') }}">
					            {{ csrf_field() }}
								<input type="hidden" name="url1" value="{{ $n->url1 }}"/>
								<input type="submit" class="btn btn-xs btn-primary" value="download"/>
							</form>
					   </td>
					</tr>
					<tr>		
					   <td>2. {{  $n->url2  }} </td>
					    <td><form method="post" action="{{ url('/file-download') }}">
					            {{ csrf_field() }}
								<input type="hidden" name="url1" value="{{ $n->url2 }}"/>
								<input type="submit" class="btn btn-xs btn-primary" value="download"/>
							</form>
					   </td>
					   </tr>
					<tr>
					   <td>3. {{  $n->url3  }} </td>
					   <td>
					   @if(!empty($n->url3))
								<form method="post" action="{{ url('/file-download') }}">
					            {{ csrf_field() }}
								<input type="hidden" name="url1" value="{{ $n->url3 }}"/>
								<input type="submit" class="btn btn-xs btn-primary" value="download"/>
							</form>
						@endif	
					   </td>
					   </tr>
					<tr>
					   <td>4. {{  $n->url4  }} </td>
					   
					   </tr>
					<tr>
					   <td>5. {{  $n->url5  }} </td>
					   </tr>
					<tr>
					   <td>6. {{  $n->url6  }} </td>
					   </tr>
					<tr>
					   <td>7. {{  $n->url7  }} </td>
					   </tr>
					<tr>
					   <td>8. {{  $n->url8  }} </td>
					   </tr>
					<tr>
					   <td>9. {{  $n->url9  }} </td>
					   </tr>
					<tr>
					   <td>10. {{  $n->url10  }} </td>
					</tr>
					</table>
					</span>
                </li>
                @endforeach
                </ul>
        
			  
			  
			  
			  <!-- <div id="load_news"></div> -->
			   
			<br/>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
		</div>
	 
 
    </section>
    <!-- /.content -->
     
 	
@endsection	