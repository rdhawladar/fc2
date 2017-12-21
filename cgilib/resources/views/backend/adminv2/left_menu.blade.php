            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ URL::asset('/kachamal/images/img.jpg') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i> Home   </a>  </li>
                  
                  <li><a><i class="fa fa-edit"></i> メンバー設定 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">                      
                      <li><a href="{{ url('/admin/members-registration') }}">Member Registration</a></li>
                      <li><a href="{{ url('/admin/fc2-members-list') }}">Members List</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-desktop"></i> メッセージ設定 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ url('/admin/message-entry') }}">Message Entry</a></li>
                        <li><a href="{{ url('/admin/message-list') }}">Message List</a></li>
                    </ul>
                  </li>
                  
                  
                  <li><a><i class="fa fa-table"></i> サポート <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/pending-report') }}">Pending/Active Report</a></li>
	  	      <li><a href="{{ url('/admin/done-report') }}">Done Report</a></li>
                    </ul>
                  </li>              	  	                       
				   
                  <li><a><i class="fa fa-windows"></i> URL 設定 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/url-entry-new') }}">URL Entry</a></li>                   
                    </ul>
                  </li>                 
                  
                  
                </ul>
              </div>
  

            </div>
            <!-- /sidebar menu -->
