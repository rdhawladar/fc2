@extends('backend.adminv2.main_template')
 
@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    
                  <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                  <div class="count">{{ $total_users }}</div>
                  <h3>ユーザー数 </h3>
                  
                  <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
                </div>
              </div>
              


		 <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div class="count">{{ $today_pending }}</div>
                  <h3>今日の末完了 </h3>

                </div>
              </div>


              
              
            
              
               <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count">{{ $today_done }}</div>
                  <h3>今日の完了数 </h3>
                 
                </div>
              </div>
              
              
       

 
              
                
                 <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    
                  <div class="icon"><i class="fa fa-comments-o"></i></div>
                  <div class="count">{{ ( $total_msg)  }}</div>
                  <h3>メッセージ数 </h3>
                   
                 <!-- <p>Lorem ipsum psdea itgum rixt.</p> --> 
                </div>
              </div>
               
             
               
            </div>

           

         
          </div>
        </div>
        <!-- /page content -->
@endsection 
@section('custom_script')

@endsection
