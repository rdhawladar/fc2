@extends('backend.adminv2.login_main_template')
@section('content')
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="{{ url('/admin/authenticate') }}">
                {{ csrf_field() }}
              <h1>FC2Admin Login</h1>
              <div>
                <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{ old('email') }}" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Enter Password" id="password"  name="password" />
              </div>
              <div>
                <button class="btn btn-success submit" href="index.html">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!--<p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>-->

                <div class="clearfix"></div>
                <br />

                <div>
                 <!-- <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>-->
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
         
        </div>
      </div>
    </div>
@endsection