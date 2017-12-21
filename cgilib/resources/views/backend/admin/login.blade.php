@extends('layouts.app_admin') 
@section('content')


<div class="login-box" >
	<div class="login-logo">
		<a href="#" style="color:#F051DB;"><b>FC2Control Admin</b></a>
	</div>
  
	<div class="login-box-body" style="background:#fff;">
		<p class="login-box-msg">&nbsp;</p> 

		<form  method="post" action="{{ url('/admin/authenticate') }}">
			{{ csrf_field() }}
			
			<div class="form-group has-feedback">
				<input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
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
					  <!-- <input type="checkbox"> Remember Me -->
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
