            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ URL::asset('/kachamal/images/img.jpg') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->nick_name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>&nbsp;</h3>
                <ul class="nav side-menu">
                  	
                   <li><a>  
                   <div class="alert alert-warning alert-dismissible fade in" role="alert">
                        <strong>Username: {{ Auth::user()->nick_name }}</strong><br/>
                        Email: {{ Auth::user()->email }}</br>
                        Password: {{ Auth::user()->readable_password }}<br/>
                        FC2 Account: {{ Auth::user()->hobby }}<br/>
                        FC2 Password: {{ Auth::user()->premium_password }}						
                        </div>
                        </a>
                  </li>
				  <li>
					<a><div class="alert alert-warning alert-dismissible fade in" role="alert">
                        <strong>Today Pending: {{ $total_pending_today }}</strong><br/>
                        Today Done: {{ $total_done_today }}</br>						
						Total Done: {{ $total_done }}
                        </div>
					</a>	
				   
				  </li>
				  
            <!--
                  <li><a  href="{{ url('/user/home') }}">Page 1</a></li>
                  <li><a  href="{{ url('/user/home/two') }}">Page 2</a></li>
                  <li><a  href="{{ url('/user/home/three') }}">Page 3</a></li>
                  <li><a  href="{{ url('/user/home/four') }}">Page 4</a></li>

-->
                  </ul>
              </div>
  

            </div>
            <!-- /sidebar menu -->
