@extends('layouts.app') 
@section('content')
<style type="text/css">
input::-webkit-input-placeholder {
  color: #636363;
}
</style>
<div class="login-box">
    <!--
	<div class="login-logo">
		<a href="#" style="color:#F051DB;"><b>俺達の秘密基地</b></a>
	</div>-->
    
	<div class="login-box-body" style="-ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=50)';filter: alpha(opacity=50);-moz-opacity: 0.5;-khtml-opacity: 0.5;opacity: 0.5;">
	
		<p style="color:#F051DB;font-size:44px;text-align:center;">FC2Control Admin</p> 

		<form  method="post" action="{{ url('/login') }}">
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
					 <!--  <input type="checkbox"> Remember Me -->
					</label>
				  </div>
				</div>		 
				<div class="col-xs-4">
				  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div>			 
			</div>
			
		</form>

		<!-- <a href="#">I forgot my password</a>--><br> 
		<!-- <a href="{{ url('/register') }}" class="text-center">Register a new membership</a>	 -->
	</div>

</div>
@endsection
