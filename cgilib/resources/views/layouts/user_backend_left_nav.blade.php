<aside class="main-sidebar">
     
    <section class="sidebar">
       
		<div class="user-panel">
			<div class="pull-left image">
			  <img src="{{ URL::asset('/assets/dist/img/profile/'. \Auth::user()->profile_picture  ) }}" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
			  <p>{{ \Auth::user()->first_name }} {{ \Auth::user()->last_name }}</p>
			  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
	  
      
       
		<ul class="sidebar-menu" data-widget="tree" style="font-size:10px;">        
		
            <li><a href="{{ url('/user/home') }}"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>
			
			
			<!--
			<li><a href="{{ url('/user/membership-power') }}"><i class="fa fa-dashboard"></i> <span>一緒に遊ぶ会員権</span></a></li>
				
			<li><a href="{{ url('/user/ithopia-request-form') }}"><i class="fa fa-folder"></i> <span>ユートピア</span></a></li>
			
			<li><a href="{{ url('/user/give-business-idea') }}"><i class="fa fa-files-o"></i> <span>ビジネスアイディア募集</span></a></li>
			<li><a href="{{ url('/user/question-answer') }}"><i class="fa fa-th"></i> <span>Q＆A音声</span></a></li>
			
			<li><a href="{{ url('/user/mobile-application') }}"><i class="fa fa-calendar"></i> <span>そこそこの達人</span></a></li>	
			<li><a href="{{ url('/user/business-member-audition') }}"><i class="fa fa-table"></i> <span>創業メンバーオーディション</span></a></li> 
			 
			<li><a href="{{ url('/user/majime-terrorist') }}"><i class="fa fa-share"></i> <span>真面目なテロリスト</span></a></li>
			<li><a href="{{ url('/user/blockchain-related-lecture') }}"><i class="fa fa-book"></i> <span>世界一分かりやすいブロックチェーン講義</span></a></li>
			
			<li><a href="{{ url('/user/bitcoin-related-lecture') }}"><i class="fa fa-book"></i> <span>ビットコインせどり</span></a></li>
			<li><a href="{{ url('/user/crazy-mindset') }}"><i class="fa fa-book"></i> <span>クレイジーマインドセット</span></a></li>
			<li><a href="{{ url('/user/know-realtime-earning') }}"><i class="fa fa-book"></i> <span>リアルタイムの儲け話、健康ノウハウ</span></a></li>
			<li><a href="{{ url('/user/world-secret-talk') }}"><i class="fa fa-book"></i> <span>世界の裏情報、生の話</span></a></li>
			-->
		</ul>
		
    </section>
    
</aside>