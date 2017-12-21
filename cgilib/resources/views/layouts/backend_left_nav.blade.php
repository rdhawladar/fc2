  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ URL::asset('/assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>---</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
	  
 
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree" style="font-size:11px;">
	  <!--
        <li class="header">MAIN NAVIGATION</li>
		
        <li >
          <a href="{{ url('/sys/ems/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>            
          </a>           
        </li>-->
		
		
		
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>User Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a> 
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/members-registration') }}"><i class="fa fa-circle-o"></i> 会員登録</a></li>
             <li><a href="{{ url('/admin/all-members-list') }}"><i class="fa fa-circle-o"></i> 会員一覧</a></li>
            
          </ul>
        </li>
		
		
		<!--
		<li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>カレンダー (ニュース, 報告, 告知)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/calendar-event-entry') }}"><i class="fa fa-circle-o"></i>イベント作成</a></li>
            <li><a href="{{ url('/admin/calendar-event-list') }}"><i class="fa fa-circle-o"></i>イベント一覧</a></li>
            <li><a href="{{ url('/admin/news-entry') }}"><i class="fa fa-circle-o"></i>News Entry</a></li>
            <li><a href="{{ url('/admin/news-list') }}"><i class="fa fa-circle-o"></i>News List</a></li>
            <li><a href="{{ url('/admin/event-feedback-list') }}"><i class="fa fa-circle-o"></i>Event Feedback List</a></li>
            
          </ul>
        </li>-->
		
        <li class="treeview">
			<a href="#"><i class="fa fa-book"></i> <span>Message Setting</span>
				<span class="pull-right-container">
				  <i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="{{ url('/admin/explanation-entry') }}"><i class="fa fa-circle-o"></i>Messages Entry</a></li>
				<li><a href="{{ url('/admin/explanation-list') }}"><i class="fa fa-circle-o"></i>Messages</a></li>     
			</ul>
		</li>		
		
		
		
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>URL Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/videos-entry') }}"><i class="fa fa-circle-o"></i> URL Entry</a></li>
            <li><a href="{{ url('/admin/video-list') }}"><i class="fa fa-circle-o"></i> URL List</a></li>
          </ul>
        </li>
        
        
		<!--
		
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Audio Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/audios-entry') }}"><i class="fa fa-circle-o"></i> Audio Entry</a></li>
            <li><a href="{{ url('/admin/audios-list') }}"><i class="fa fa-circle-o"></i> Audio List</a></li>
          </ul>
        </li>  
          
          
          
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Requests </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/business-member-audition-request') }}"><i class="fa fa-circle-o"></i>Member Audition Request</a></li>
            <li><a href="{{ url('/admin/question-answer-request') }}"><i class="fa fa-circle-o"></i> Question Answer Request</a></li>
            <li><a href="{{ url('/admin/majime-terrorist-requests') }}"><i class="fa fa-circle-o"></i> Majime Terrorist Request</a></li>
          </ul>        
        </li>  
          -->
          
		
		<!--		
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>一緒に遊ぶ会員権 (アンケート)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/membership-power-feedback-entry') }}"><i class="fa fa-circle-o"></i>アンケート質問入力</a></li>
            <li><a href="{{ url('/admin/membership-power-feedback-list') }}"><i class="fa fa-circle-o"></i>アンケート質問一覧</a></li>		
            <li><a href="{{ url('/admin/membership-power-user-feedback-list') }}"><i class="fa fa-circle-o"></i>会員回答一覧</a></li>

          </ul>
        </li>	
        
       
		
		
		
		
        
        
         
        <li>
          <a href="{{ url('/admin/ithupia-request-list') }}">
            <i class="fa fa-th"></i> <span> ユートピア（リクエストフォーム）</span>
          </a>
        </li>
         
		
   
       
   
  
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>ビジネスアイディア募集</span>
			<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
      			
            <li><a href="{{ url('/admin/sample-business-idea-entry') }}"><i class="fa fa-circle-o"></i>例アイディア入力</a></li>
            <li><a href="{{ url('/admin/business-idea-request-list') }}"><i class="fa fa-circle-o"></i>会員アイディア一覧</a></li>
			<li><a href="{{ url('/admin/business-idea-vote-list') }}"><i class="fa fa-circle-o"></i>投票一覧</a></li>			
          </ul>
        </li>
		
		 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Q&A音声</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
            <li><a href="{{ url('/admin/question-answer-entry') }}"><i class="fa fa-circle-o"></i> Q&A音声アップロード</a></li>
            <li><a href="{{ url('/admin/question-answer-entry-list') }}"><i class="fa fa-circle-o"></i>Q&A音声一覧</a></li>
          </ul>
        </li>
		 
       
		<li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>そこそこの達人</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
            <li><a href="{{ url('/admin/mobile-app-upload') }}"><i class="fa fa-circle-o"></i>アプリ</a></li>
            <li><a href="{{ url('/admin/video-upload') }}"><i class="fa fa-circle-o"></i>動画アップロード</a></li>
			<li><a href="{{ url('/admin/app-video-list') }}"><i class="fa fa-circle-o"></i>動画一覧</a></li>
            <li><a href="{{ url('/admin/user-queries') }}"><i class="fa fa-circle-o"></i>会員質問一覧</a></li>
          </ul>
        </li> 
     
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span> 創業メンバーオーディション</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
 
            <li><a href="{{ url('/admin/users-audition-requests') }}"><i class="fa fa-circle-o"></i>会員申し込み一覧</a></li>
          </ul>
        </li> 
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>真面目なテロリスト</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
            <li><a href="{{ url('/admin/qualification-entry') }}"><i class="fa fa-circle-o"></i>参加出来る人概要入力</a></li>
            <li><a href="{{ url('/admin/qualification-list') }}"><i class="fa fa-circle-o"></i>参加出来る人の概要表示</a></li>
            <li><a href="{{ url('/admin/majime-terrorist-users-requests') }}"><i class="fa fa-circle-o"></i>応募一覧</a></li>
          </ul>
        </li> 
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>ブロックチェーン講義</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
            <li><a href="{{ url('/admin/blockchain-related-video-upload') }}"><i class="fa fa-circle-o"></i>動画アップロード</a></li>
            <li><a href="{{ url('/admin/blockchain-related-video-list') }}"><i class="fa fa-circle-o"></i>動画一覧</a></li>
          </ul>
        </li> 
		
	 

		<li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>ビットコインせどり</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
            <li><a href="{{ url('/admin/bitcoin-related-video-upload') }}"><i class="fa fa-circle-o"></i>動画アップロード</a></li>
            <li><a href="{{ url('/admin/bitcoin-related-video-list') }}"><i class="fa fa-circle-o"></i>動画一覧</a></li>
          </ul>
        </li> 

		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>クレイジーマインドセット</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
            <li><a href="{{ url('/admin/crazy-mindset-audio-upload') }}"><i class="fa fa-circle-o"></i>音声アップロード</a></li>
            <li><a href="{{ url('/admin/crazy-mindset-audio-list') }}"><i class="fa fa-circle-o"></i>音声一覧</a></li>
          </ul>
        </li> 
		-->
	 
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>