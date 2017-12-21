<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\CalendarEvents; 
use App\NewsFeed;
use App\NewsPoll;
use App\CalendarPollRequestForm;
use App\URLEntry;
use App\URLEntryTwo;
use App\UserMessages;
use DB; 
use Auth;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class CalendarController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function getShareVideosDownloadLink($browse_url)
    {  
    	//echo "Admin Put Download URL: ";
        //"https://www.tube8.com/amateur/18-year-old-college-babe-sucks-my-cock-and-gets-a-oral-creampie/36682601/";
    	//echo  $browse_url = "https://www.tube8.com/amateur/incredibly-cute-and-hot-teen-fucked-%28barely-18%29/37264551/";
       // echo "</br>";
      
        //find iframe link
    	$client = new Client();
        $goutteClient = new Client();
        $guzzleClient = new GuzzleClient(array(
        		          'timeout' => 1000,
                	    ));
        $goutteClient->setClient($guzzleClient);
    	$crawler = $goutteClient->request('GET', $browse_url);	 
    	$dldata = $crawler->filter("iframe")->each(function ($node) {
         	return $node->attr('src') ;
        });       
    	$emb_url = $dldata[0];
        $emb_url = str_replace('"','', $emb_url);  
    
    	//find share-videos.se download link
    	$client2 = new Client();
        $goutteClient2 = new Client();
        $guzzleClient2 = new GuzzleClient(array(
        		          'timeout' => 1000,
                	    ));
        $goutteClient2->setClient($guzzleClient2);
    	$crawler2 = $goutteClient2->request('GET', $emb_url);	
    	$data = $crawler2->filter("source")->each(function ($node) {
         	return $node->attr('src') ;
        });
       
    	return $data[1];
    }
	
	
	
	//finding www.tube8.com download link
	public function getTube8DownloadLink($url)
    {
    	$client = new Client();
        $goutteClient = new Client();
        $guzzleClient = new GuzzleClient(array(
        		          'timeout' => 1000,
                	    ));
        $goutteClient->setClient($guzzleClient);
    	$crawler = $goutteClient->request('GET', $url);
    	$dldata2 = $crawler->filter("script")->each(function ($node) {
         	return $node->html() ;
        });	
    	$download_url_finder = $dldata2[19];
        $p = explode(';' ,  $dldata2[19]);
        $embed_url = $p[1];
		$url = str_replace("page_params.embedCode = '",'',$embed_url);
        $url = str_replace("'",'',$url);    
    
        //echo $embed_url;
    	$doc = new \DOMDocument();
		$doc->loadHTML($url);
		$xpath = new \DOMXPath($doc);
		$src = $xpath->evaluate("string(//iframe/@src)");
    
        $len = strlen($src);
        $src = substr($src , 0, $len-1);
       
    
    	$client2 = new Client();
        $goutteClient2 = new Client();
        $guzzleClient2 = new GuzzleClient(array(
        		          'timeout' => 1000,
                	    ));
        $goutteClient2->setClient($guzzleClient2);
    	$crawler2 = $goutteClient2->request('GET', $src);
      	$iframeurldata = $crawler2->filter("script")->each(function ($node) {
         	return $node->html();
        });
    	 
        $data = $iframeurldata[3];
    	$data = str_replace('\\','',$data);
        $p = explode(",",$data);
        $dl_url = $p[44];
        $dl_url = str_replace('"videoUrl":"' , '' , $dl_url );    
        $dl_url = str_replace('"}' , '' , $dl_url );    
       return $dl_url;
  
    }
	


	public function getJpPornHubDonwloadLink($url)
    {
        $client1 = new Client();
        $goutteClient1 = new Client();
        $guzzleClient1 = new GuzzleClient(array(
        		          'timeout' => 1000,
                	    ));
        $goutteClient1->setClient($guzzleClient1);
    	$crawler1 = $goutteClient1->request('GET', $url);	
    	$title_data = $crawler1->filter("script")->each(function ($node) {
         	return $node->html() ;
        });
    	
    	$parse = $title_data[2];
    	$d = explode("," , $parse);
    
    	$dlurl = $d[38];
    	$dlurl = str_replace('"videoUrl":"','',$dlurl);
    	$dlurl = str_replace('"}]','',$dlurl);
    	echo  $dlurl = str_replace('\\','',$dlurl);
    }



	        
    public function index()
    {		
        $c = date('Y-m-d');
	 	$calendar_events = CalendarEvents::orderBy('id','desc')->get();
		$user_id = Auth::user()->id;
		
		$urls =  URLEntry::where('user_id',$user_id)
        			->select(['id','url1','url1_title','dl_status1','url2','url2_title','dl_status2','url3','url3_title','dl_status3'])
					->whereDate('sdate','=',$c)
					->orderBy('id','desc')
					->first();		
    	
		
		$m = UserMessages::where('user_id','=',$user_id)->orderBy('id','desc')->first();
		if($m){
			$msg1 = $m->msg1;
			$msg2 = $m->msg2;
		}else{
			$msg1 = '';
			$msg2 = '';		    
		}
		
		$count = URLEntry::where('user_id',$user_id)
		->whereDate('sdate','=',$c)
		->orderBy('id','desc')->count();
		
        $qry = URLEntry::get();
    	$cnt = $qry->count();
        $downloadLinks[] = '';
        $dloads = collect($downloadLinks);
		if($count == 0 ){       		
          return view('backend.userv2.fc2_blank_home')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('urls',$urls) 
           ->with('downloadLinks' , $dloads)
          ->with('rowid', 0); 
        
		}else{        
        	$dowload_site1 = "share-videos";
   			$dowload_site2 = "tube8.com";
   			$dowload_site3 = "jp.pornhub.com";   
        
           	$browse_url1 = $urls->url1;
        	$browse_url2 = $urls->url2;
        	$browse_url3 = $urls->url3;
        	 
        
        	$downloadLinks = [];
            
                if( strpos($browse_url1 ,$dowload_site1) ){
                	if(!empty($browse_url1)) {
                  	$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url1);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url1 ,$dowload_site2) ) {
                	if(!empty($browse_url1)) {
                  		$downloadLinks[] =  $this->getTube8DownloadLink($browse_url1);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url1 ,$dowload_site3) ) {
                    //echo 235;
                   
                		$downloadLinks[] = '#';
                   
                } 
        
        
        		if( strpos($browse_url2 ,$dowload_site1) ){
                	if(!empty($browse_url2)) {
                    	$downloadLinks[] = $this->getShareVideosDownloadLink($browse_url2);
                     }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url2 ,$dowload_site2) ) {                    
                	if(!empty($browse_url2)) {
                    	$downloadLinks[] =$this->getTube8DownloadLink($browse_url2);
                     }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url2 ,$dowload_site3) ) {
                    
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url3 ,$dowload_site1) ){
                	if(!empty($browse_url3)) {
                    $downloadLinks[] =$this->getShareVideosDownloadLink($browse_url3);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url3 ,$dowload_site2) ) {
                	if(!empty($browse_url3)) {
                   	$downloadLinks[] = $this->getTube8DownloadLink($browse_url3);
                    }else{
                    	$downloadLinks[] = '#';
                    }                    
                }           
                else if( strpos($browse_url3 ,$dowload_site3) ) {
                 
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		  
             
		    return view('backend.userv2.fc2home')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('urls',$urls)
            ->with('downloadLinks' , $downloadLinks)
            ->with('rowid', $urls['id'] ); 
		}	
    }    


	public function index_two()
    {
    	$c = date('Y-m-d');
	 	$calendar_events = CalendarEvents::orderBy('id','desc')->get();
		$user_id = Auth::user()->id;
		
		$urls =  URLEntry::where('user_id',$user_id)
        			->select(['id','url4','url4_title','dl_status4','url5','url5_title','dl_status5','url6','url6_title','dl_status6'])
					->whereDate('sdate','=',$c)
					->orderBy('id','desc')
					->first();		
    			
		$m = UserMessages::where('user_id','=',$user_id)->orderBy('id','desc')->first();
		if($m){
			$msg1 = $m->msg1;
			$msg2 = $m->msg2;
		}else{
			$msg1 = '';
			$msg2 = '';		    
		}
		
		$count = URLEntry::where('user_id',$user_id)
		->whereDate('sdate','=',$c)
		->orderBy('id','desc')->count();
		
        $qry = URLEntry::get();
    	$cnt = $qry->count();
        $downloadLinks[] = '';
        $dloads = collect($downloadLinks);
		if($count == 0 ){       		
          return view('backend.userv2.fc2_blank_home')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('urls',$urls) 
           ->with('downloadLinks' , $dloads)
          ->with('ud' , $user_id)
          ->with('rowid', ''); 
        
		}else{        
        	$dowload_site1 = "share-videos";
   			$dowload_site2 = "tube8.com";
   			$dowload_site3 = "jp.pornhub.com";   
        
         
        	$browse_url4 = $urls['url4'];
        	$browse_url5 = $urls['url5'];
        	$browse_url6 = $urls['url6'];
        	 
        
        	$downloadLinks = [];
            
               
         
        
        		if( strpos($browse_url4 ,$dowload_site1) ){
                	if(!empty($browse_url4)) {
                  	$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url4);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url4 ,$dowload_site2) ) {
                	if(!empty($browse_url4)) {
                   		$downloadLinks[] = $this->getTube8DownloadLink($browse_url4);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url4 ,$dowload_site3) ) {
                   
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url5 ,$dowload_site1) ){
                	if(!empty($browse_url5)) {
                    	$downloadLinks[] =$this->getShareVideosDownloadLink($browse_url5);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url5 ,$dowload_site2) ) {
                	if(!empty($browse_url5)) {
                   $downloadLinks[] = $this->getTube8DownloadLink($browse_url5);
                     }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url5 ,$dowload_site3) ) {
                    
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url6 ,$dowload_site1) ){
                	if(!empty($browse_url6)) {
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url6);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url6 ,$dowload_site2) ) {
                	if(!empty($browse_url6)) {
                  		 $downloadLinks[] = $this->getTube8DownloadLink($browse_url6);
                      }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url6 ,$dowload_site3) ) {
                     
                		$downloadLinks[] = '#';
                     
                }          
        
            $rowid = $urls['id'];
        
		    return view('backend.userv2.fc2home_two')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('urls',$urls)
            ->with('downloadLinks' , $downloadLinks)
            ->with('ud' , $user_id)
            ->with('rowid', $rowid );
		}	    	
    }



	public function index_three()
    {
    	$c = date('Y-m-d');
	 	$calendar_events = CalendarEvents::orderBy('id','desc')->get();
		$user_id = Auth::user()->id;
		
		$urls =  URLEntry::where('user_id',$user_id)
        			->select(['id','url7','url7_title','dl_status7','url8','url8_title','dl_status8','url9','url9_title','dl_status9'])
					->whereDate('sdate','=',$c)
					->orderBy('id','desc')
					->first();		
    			
		$m = UserMessages::where('user_id','=',$user_id)->orderBy('id','desc')->first();
		if($m){
			$msg1 = $m->msg1;
			$msg2 = $m->msg2;
		}else{
			$msg1 = '';
			$msg2 = '';		    
		}
		
		$count = URLEntry::where('user_id',$user_id)
		->whereDate('sdate','=',$c)
		->orderBy('id','desc')->count();
		
        $qry = URLEntry::get();
    	$cnt = $qry->count();
        $downloadLinks[] = '';
        $dloads = collect($downloadLinks);
		if($count == 0 ){       		
          return view('backend.userv2.fc2_blank_home')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('urls',$urls) 
           ->with('downloadLinks' , $dloads)
          ->with('ud',$user_id)
          ->with('rowid', '')
          ; 
        
		}else{        
        	$dowload_site1 = "share-videos";
   			$dowload_site2 = "tube8.com";
   			$dowload_site3 = "jp.pornhub.com";   
        
         
        	$browse_url7 = $urls->url7;
        	$browse_url8 = $urls->url8;
        	$browse_url9 = $urls->url9;        	 
        
        	$downloadLinks = [];
                          
                 
        		if( strpos($browse_url7 ,$dowload_site1) ){
                	if(!empty($browse_url7)) {
                  	$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url7);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url7 ,$dowload_site2) ) {
                	if(!empty($browse_url7)) {
                   		$downloadLinks[] = $this->getTube8DownloadLink($browse_url7);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url7 ,$dowload_site3) ) {
                   
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url8 ,$dowload_site1) ){
                	if(!empty($browse_url8)) {
                    	$downloadLinks[] =$this->getShareVideosDownloadLink($browse_url8);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url8 ,$dowload_site2) ) {
                	if(!empty($browse_url8)) {
                   $downloadLinks[] = $this->getTube8DownloadLink($browse_url8);
                     }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url8 ,$dowload_site3) ) {
                    
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url9 ,$dowload_site1) ){
                	if(!empty($browse_url9)) {
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url9);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url9 ,$dowload_site2) ) {
                	if(!empty($browse_url9)) {
                  		 $downloadLinks[] = $this->getTube8DownloadLink($browse_url9);
                      }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url9 ,$dowload_site3) ) {
                     
                		$downloadLinks[] = '#';
                     
                }          
        
		    return view('backend.userv2.fc2home_three')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('urls',$urls)
            ->with('downloadLinks' , $downloadLinks)
            ->with('ud',$user_id)
            ->with('rowid', $urls['id']);
		}	    	
    }


	public function index_four()
    {
    	$c = date('Y-m-d');
	 	$calendar_events = CalendarEvents::orderBy('id','desc')->get();
		$user_id = Auth::user()->id;
		
		$urls =  URLEntry::where('user_id',$user_id)
        			->select(['id','url10','url10_title','dl_status10'])
					->whereDate('sdate','=',$c)
					->orderBy('id','desc')
					->first();		
    			
		$m = UserMessages::where('user_id','=',$user_id)->orderBy('id','desc')->first();
		if($m){
			$msg1 = $m->msg1;
			$msg2 = $m->msg2;
		}else{
			$msg1 = '';
			$msg2 = '';		    
		}
		
		$count = URLEntry::where('user_id',$user_id)
		->whereDate('sdate','=',$c)
		->orderBy('id','desc')->count();
		
        $qry = URLEntry::get();
    	$cnt = $qry->count();
        $downloadLinks[] = '';
        $dloads = collect($downloadLinks);
		if($count == 0 ){       		
          return view('backend.userv2.fc2_blank_home')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('urls',$urls) 
           ->with('downloadLinks' , $dloads)
          ->with('ud',$user_id)
          ->with('rowid', 0)
          ; 
        
		}else{        
        	$dowload_site1 = "share-videos";
   			$dowload_site2 = "tube8.com";
   			$dowload_site3 = "jp.pornhub.com";   
        
         
        	$browse_url10 = $urls->url10;
        
        	$downloadLinks = [];
                          
                 
        		if( strpos($browse_url10 ,$dowload_site1) ){
                	if(!empty($browse_url10)) {
                  	$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url10);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url10 ,$dowload_site2) ) {
                	if(!empty($browse_url10)) {
                   		$downloadLinks[] = $this->getTube8DownloadLink($browse_url10);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url10 ,$dowload_site3) ) {
                   
                		$downloadLinks[] = '#';
                    
                } 
        
         
        
		    return view('backend.userv2.fc2home_four')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('urls',$urls)
            ->with('downloadLinks' , $downloadLinks)
            ->with('ud',$user_id)
            ->with('rowid', $urls['id']);
		}	    	
    }





    public function change_task_status($user_id , $url_id , $sdate )
    {
        $query = URLEntry::whereDate('sdate','=',$sdate)->where('user_id','=',$user_id)->where('dl_status'. $url_id ,'=', 0);
        
        
        //echo $query->count();
        if($query->count() == 1 ) {
            
           URLEntry::whereDate('sdate','=',$sdate)->where('user_id','=',$user_id)->update([ 'dl_status'. $url_id.''  => 1 ]);
            
        }  
        return redirect('/user/home');
    }




















	public function event_details($date)
	{		
	    //  echo $date;
	   $e = CalendarEvents::whereYear('created_at','=',date('Y',strtotime($date)))
	                    ->whereMonth('created_at','=',date('m',strtotime($date)))
	                    ->whereDay('created_at','=',date('d',strtotime($date)))
	                    ->first(); 
	                    
	 
	                   
		return view('backend.user.calendar.calendar_event_detail_page')	
		        ->with('event_date', $date)
		        ->with('e', $e); 
	}	
	 
	public function calendar_event_details($id)
	{
	     $e = CalendarEvents::where('id','=',$id)->first();
	     return view('backend.user.calendar.calendar_event_detail_page')
	                ->with('e',$e);
	}
	
	 public function calendar_events_json()
	{
		$month   = date ("m");
		$year    = date("Y");
		$day     = date("d");
		$endDate = date("t" , mktime(0,0,0,$month,$day,$year) );
		$today   = date("F, d Y " , mktime(0,0,0,$month,$day,$year) );		
		$s = date ("w", mktime (0,0,0,$month,1,$year) );	
		
		
		$c = date('Y-m-01');
		$lc = date('y').'-'.($month+3) . '-30';
		
		
		$events = CalendarEvents::whereBetween('event_date',[ $c ,$lc ])->orderBy('event_date','asc')
		                    ->get();
		                    
		
		//dd($events);
		
		$html = '<ul class="timeline">';
		
		foreach( $events as $e) {
		    $html .= '<li class="time-label"><span class="bg-red">'. date("M,Y", strtotime($e->event_date)) .'</span></li>';
			$html .= '<li>
			 <i class="fa  bg-blue">'. date("d", strtotime($e->event_date)) .'</i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> '. date("H:i", strtotime($e->created_at))  .'</span>
            <h3 class="timeline-header"><a href="http://sbkmart.com/v2/user/calendar-detail/'. $e->id .'">'. $e->event_title .'</a> ...</h3>
            
        </div>';
		}
		$html .= '</ul>';
		
		$data = array('data'=>$html);
		return response($data)
		->header("Access-Control-Allow-Origin", "*")
        ->header("Access-Control-Allow-Credentials", true)
        ->header("Access-Control-Allow-Methods", "PUT, POST, GET, OPTIONS, DELETE");


	}	
	 
 
    public function calendar_json()
	{
		$month   = date ("m");
		$year    = date("Y");
		$day     = date("d");
		$endDate = date("t" , mktime(0,0,0,$month,$day,$year) );
		$today   = date("F, d Y " , mktime(0,0,0,$month,$day,$year) );		
		$s = date ("w", mktime (0,0,0,$month,1,$year) );	
		
		$c = date('m');
		$lc = date('m')-3;
		
		$events = CalendarEvents::whereMonth('created_at','=>', $c )->whereMonth('created_at','<=',$lc)->get();	
		
				
		
		$html = '<table align="center" border="0" cellpadding="5" cellspacing="5" style="width:100%;">
        			<tr>
        				<td align="center">Today : '. $today .'</td>
        			</tr>
        		 </table>
        		 <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:100%;border:1px solid #CCCCCC">
        				<thead>
        					<tr bgcolor="#EFEFEF">
        						<td align="center">Mon</td>
        						<td align="center">Sun</td>
        						<td align="center">Tue</td>
        						<td align="center">Wed</td>
        						<td align="center">Thu</td>
        						<td align="center">Fri</td>
        						<td align="center">Sat</td>
        					</tr>
        				</thead>';
		
		for( $ds = 1 ; $ds <= $s ; $ds++ ) {
			$html .= '<td style="font-family:arial;color:#B3D9FF;height:200px;border:1px solid #ccc;" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;&nbsp;</td>';
		}
		
		
		for( $d = 1; $d <= $endDate ; $d++)
		{						
			if (date("w",mktime (0,0,0,$month,$d,$year)) == 0){ 
			 $html .= '<tr>';
			}					
			
			$fontColor="#000000";
			
			if ( date("D" , mktime (0,0,0,$month,$d,$year) ) == "Sun")
			{ 	 						 
					$fontColor="red";
			}
				    
			if($d == $day)
			{	
				//echo 23;
				$fe = CalendarEvents::whereDay('created_at','=', $d)->whereMonth('created_at','=', date('m'))->whereYear('created_at','=', date('Y'))->first();	
				$html .= '<td style="font-family:arial;font-size:13px;color:#333333;width:14%;height:200px;background-color:#eea236;border:1px solid #ccc;" align="center" valign="middle">
					<span style="color:'. $fontColor .';text-decoration:underline;">
						<a href="'. url('/v2/user/calendar-event-detail/'. $year.'-'.$month.'-'. $d   ) .'">
							'. $d .'
						</a>							
					</span>
					<table width="100%">
					<tr>
						<td align="center" style="background-color:#001f3f;color:#fff;border-radius:10px;">'. $fe['event_title'] .'</td>
					</tr>
					</table>
				</td>';
			
			}
			else
			{		
				//echo 24;
				$fe = CalendarEvents::whereDay('created_at','=', $d)->whereMonth('created_at','=', date('m'))->whereYear('created_at','=', date('Y'))->first();	
				
				$html .= '<td style="font-family:arial;font-size:13px;color:#333333;width:14%;height:200px;border:1px solid #ccc;" align="center" valign="middle">
					<span style="color:'. $fontColor  .';">
						<a href="'. url('/v2/user/calendar-event-detail/'. $year.'-'.$month.'-'. $d ) .'">
						'. $d .'
						</a>
					</span>
					<table width="100%">
					<tr>
						<td align="center" style="background-color:#001f3f;color:#fff;border-radius:10px;">'. $fe['event_title']  .'</td>
					</tr>
					</table>
				</td>';					
			}
			
			if ( date("w" , mktime (0,0,0,$month,$d,$year)) == 6 )
			{ 		 
				$html .= '</tr>'; 
			}					
		}
		$html .='		</table>'; 
		
		$table = array('data' => $html);
		
		return response($table)->header("Access-Control-Allow-Origin", "*")
        ->header("Access-Control-Allow-Credentials", true)
        ->header("Access-Control-Allow-Methods", "PUT, POST, GET, OPTIONS, DELETE");
	}	
	
	
    public function make_poll(Request $r)
	{
	    $news_id = trim($r->input("news_id"));
	    $vote_for = trim($r->input("vote_for"));
	    $user_id = \Auth::user()->id;
	    
	    $ncc = NewsPoll::where('news_id','=',$news_id)->where('user_id','=',$user_id)->count();
        if( $ncc == 0 ) {
    	    $n = new NewsPoll();
    	    $n->news_id = $news_id;
    	    $n->user_id = $user_id;
    	    $n->vote_for = $vote_for;
    	    $n->created_at = date('Y-m-d H:i:s');
    	    $n->updated_at = date('Y-m-d H:i:s');
    	    $n->save();
    	    echo 1;
        }else{
            echo 0;
        }
	    
	}
	
	public function poll_result($id)
	{
	    $yes_count = NewsPoll::where('news_id','=',$id)->where('vote_for','=','yes')->count();
	    $no_count = NewsPoll::where('news_id','=',$id)->where('vote_for','=','no')->count();	    
	    
	    $data= array("yes"=>$yes_count , "no"=>$no_count );
	    return response($data)
	    	->header("Access-Control-Allow-Origin", "*")
        ->header("Access-Control-Allow-Credentials", true)
        ->header("Access-Control-Allow-Methods", "PUT, POST, GET, OPTIONS, DELETE");

	}
	
	
	public function poll_request_form(Request $r)
	{
	    $cp = new CalendarPollRequestForm();
	    $cp->news_id = trim($r->input("news_id"));
	    $cp->name = trim($r->input("name"));
	    $cp->email = trim($r->input("email"));
	    $cp->message = trim($r->input("message"));
	    $cp->created_at = date('Y-m-d H:i:s');
	    $cp->updated_at = date('Y-m-d H:i:s');
	    $cp->save();
	    echo 1;
	}
	
}
