@extends('layouts.app') 
@section('content')
<style type="text/css">
input::-webkit-input-placeholder {
  color: #636363;
}
 
    #loginpage{
        /*background-image:url('http://sbkmart.com/assets/dist/img/lgback.png');         
        background-position:center top;        
        background-size:contain;
        background-repeat:no-repeat;
        padding:20px;
        height:200px;*/
        background: #bcce3e;
        -ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=50)';
        filter: alpha(opacity=50);
        -moz-opacity: 0.5;
        -khtml-opacity: 0.5;
        opacity: 0.5;
        border-radius: 7px 7px 7px 7px;
     }        
</style>
<div  class="login-box" >
    
	<div class="login-logo">
		<span style="margin-left:-20px ; vertical-align:middle;">FC2Control User</span>
		
		<!-- style="-ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=50)';filter: alpha(opacity=50);-moz-opacity: 0.5;-khtml-opacity: 0.5;opacity: 0.5;" -->
	</div>
     
	<div class="login-box-body" id="loginpage" >
	
		<!-- <p style="color:#F051DB;font-size:44px;text-align:center;">俺達の秘密基地</p>  -->

		<form  method="post" action="{{ url('/user/login') }}">
			{{ csrf_field() }}
			
			<div class="form-group has-feedback">
				<input type="email"  class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
			</div>
			
			<div class="form-group has-feedback">
				<input type="password" class="form-control" id="password"  name="password" placeholder="Password" >
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
			</div>
			
			<div class="row">
				<div class="col-xs-8">
				  <div class="checkbox icheck">
					<label>
					   <!-- <input type="checkbox"> Remember Me-->
					   <a href="javascript:void(0);"   style="color:#F051DB;">Forgot Password</a>
					</label>
				  </div>
				</div>		 
				<div class="col-xs-4">
				  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div>			 
			</div>
			
		</form>

		 <!-- <a href="#"   >I forgot my password</a>  
		 <a href="{{ url('/register') }}" class="text-center">Register a new membership</a>	 -->
	</div>

</div>
@endsection
