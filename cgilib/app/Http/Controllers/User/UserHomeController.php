<?php

namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
 
use App\URLEntry;
use App\URLEntryTwo;
use App\UserMessages;
use DB; 
use Auth;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class UserHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	
	
	
    public function getShareVideosDownloadLink($browse_url)
    {  
       	$client = new Client();
        $goutteClient = new Client();
        $guzzleClient = new GuzzleClient(array(
        		          'timeout' => 1000,
                	    ));
        $goutteClient->setClient($guzzleClient);
    	$crawler = $goutteClient->request('GET', $browse_url);	 
    	$dldata = $crawler->filter("video > source")->each(function ($node) {
         	return $node->attr('src') ;
        });  
        
        
        return $dldata[0];    


        /*
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
       */
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
    	
    	
    	$download_url_finder = $dldata2[18];
        $p = explode(';' ,  $dldata2[18]);
        $q = explode(",",$p[0]);
        $link  = $q[50];
     
    	$data =  str_replace("\\/", "/", $link);
    	$data =  str_replace('"quality_720p":"' , '' , $data );
    	$data =  str_replace('"' , '' , $data );
        return $data;
        
 
         /*
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
        */



  
    }
	


	public function getJpPornHubDonwloadLink()
    {
		$url = "https://jp.pornhub.com/view_video.php?viewkey=ph59ea5e3a558cd";
		
		/*
        $client1 = new Client();
        $goutteClient1 = new Client();
        $guzzleClient1 = new GuzzleClient(array(
        		          'timeout' => 1000,
                	    ));
        $goutteClient1->setClient($guzzleClient1);
    	$crawler1 = $goutteClient1->request('GET', $url);	
    	$title_data = $crawler1->filter("script")->each(function ($node) {
         	return $node->html() ;
        });*/
    	
    	dd($url);
	}
	
	
	public function index()
    {		
        $c = date('Y-m-d');
	  	$user_id = Auth::user()->id;
		
		
		$total_pending_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'done')
					->count();
					
					
		$total_pending  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'done')
					->count();			
		
		
		$urls =  URLEntryTwo::where('user_id',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
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
		
		$count = URLEntryTwo::where('user_id',$user_id)
		->whereDate('sdate','=',$c)
		->orderBy('id','desc')->count();
		
        $qry = URLEntryTwo::get();
    	$cnt = $qry->count();
        $downloadLinks[] = '';
        $dloads = collect($downloadLinks);
		if($count == 0 ){       		
          return view('backend.userv2.fc2_blank_home')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
		 
			->with('one','') 
			->with('two','') 
			->with('three','') 
			->with('four','') 
			->with('five','') 
			->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)
           ->with('downloadLinks' , $dloads)
          ->with('rowid', 0); 
        
		}else{        
        	$dowload_site1 = "share-videos";
   			$dowload_site2 = "tube8.com";
   			$dowload_site3 = "jp.pornhub.com";   
        
			$one = URLEntryTwo::where('user_id',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',1)
					->orderBy('id','desc')					
					->first();
					
			$two = URLEntryTwo::where('user_id',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',2)
					->orderBy('id','desc')					
					->first();	

			$three = URLEntryTwo::where('user_id',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',3)
					->orderBy('id','desc')					
					->first();
					
					
			$four = URLEntryTwo::where('user_id',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',4)
					->orderBy('id','desc')					
					->first();
					
			$five = URLEntryTwo::where('user_id',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',5)
					->orderBy('id','desc')					
					->first();		
		
           	$browse_url1 = $one['url'];
        	$browse_url2 = $two['url'];
        	$browse_url3 = $three['url'];
        	$browse_url4 = $four['url'];
        	$browse_url5 = $five['url'];
        	  
        
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
        
		
				if( strpos($browse_url4 ,$dowload_site1) ){
                	if(!empty($browse_url4)) {
                    $downloadLinks[] =$this->getShareVideosDownloadLink($browse_url4);
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
        				
				  
             
		    return view('backend.userv2.fc2home_new')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('one',$one)
			->with('two',$two)
			->with('three',$three)
			->with('four',$four)
			->with('five',$five)
			->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)
            ->with('downloadLinks' , $downloadLinks)
            ->with('rowid', $urls['id'] ); 
		}	
    }


	public function index_two()
    {
    	$c = date('Y-m-d');
	  	 $user_id = Auth::user()->id;
		
		
		$total_pending_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'done')
					->count();
					
					
		$total_pending  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'done')
					->count();			
		
		
		
		
		$urls =  URLEntryTwo::where('user_id',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
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
		
		$count = URLEntryTwo::where('user_id',$user_id)
		->whereDate('sdate','=',$c)
		->orderBy('id','desc')
		->count();
		
        $qry = URLEntryTwo::get();
    	$cnt = $qry->count();
        $downloadLinks[] = '';
        $dloads = collect($downloadLinks);
		if($count == 0 ){       		
          return view('backend.userv2.fc2_blank_home')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('one','') 
			->with('two','') 
			->with('three','') 
			->with('four','') 
			->with('five','') 
			->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)
           ->with('downloadLinks' , $dloads)
          ->with('ud' , $user_id)
          ->with('rowid', ''); 
        
		}else{    

		
        	$dowload_site1 = "share-videos";
   			$dowload_site2 = "tube8.com";
   			$dowload_site3 = "jp.pornhub.com";   
        
         
			$one = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',6)
					->orderBy('id','desc')					
					->first();
					
			$two = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',7)
					->orderBy('id','desc')					
					->first();	

			$three = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',8)
					->orderBy('id','desc')					
					->first();
		 
		 
			$four = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',9)
					->orderBy('id','desc')					
					->first();	

			$five = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',10)
					->orderBy('id','desc')					
					->first();
		 
		 
        	$browse_url1 = $one['url'] ;
        	$browse_url2 = $two['url'];
        	$browse_url3 = $three['url'];
			$browse_url4 = $four['url'];
        	$browse_url5 = $five['url'];
        	 
        
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
                   		$downloadLinks[] = $this->getTube8DownloadLink($browse_url1);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url1 ,$dowload_site3) ) {
                   
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url2 ,$dowload_site1) ){
                	if(!empty($browse_url2)) {
                    	$downloadLinks[] =$this->getShareVideosDownloadLink($browse_url2);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url2 ,$dowload_site2) ) {
                	if(!empty($browse_url2)) {
                   $downloadLinks[] = $this->getTube8DownloadLink($browse_url2);
                     }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url2 ,$dowload_site3) ) {
                    
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url3 ,$dowload_site1) ){
                	if(!empty($browse_url3)) {
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url3);
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
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url5);
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

				
				
				
        
            $rowid = $urls['id'];
				
		   return view('backend.userv2.fc2home_two')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('one',$one)
			->with('two',$two)
			->with('three',$three)
			->with('four',$four)
			->with('five',$five)
			->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)
            ->with('downloadLinks' , $downloadLinks)
            ->with('ud' , $user_id)
            ->with('rowid', $rowid ); 
		}	    	
    }
    
	
	
	public function index_three()
    {
    	$c = date('Y-m-d');
	 	$user_id = Auth::user()->id;
		
		
		$total_pending_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'done')
					->count();
					
					
		$total_pending  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'done')
					->count();			
		
		
		
		$urls =  URLEntryTwo::where('user_id',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
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
		
		$count = URLEntryTwo::where('user_id',$user_id)
		->whereDate('sdate','=',$c)
		->orderBy('id','desc')->count();
		
        $qry = URLEntryTwo::get();
    	$cnt = $qry->count();
        $downloadLinks[] = '';
        $dloads = collect($downloadLinks);
		if($count == 0 ){       		
          return view('backend.userv2.fc2_blank_home')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('urls',$urls) 
			->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)
           ->with('downloadLinks' , $dloads)
          ->with('ud',$user_id)
          ->with('rowid', '')
          ; 
        
		}else{        
        	$dowload_site1 = "share-videos";
   			$dowload_site2 = "tube8.com";
   			$dowload_site3 = "jp.pornhub.com";   
        
		
		
		$one = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',11)
					->orderBy('id','desc')					
					->first();
					
			$two = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',12)
					->orderBy('id','desc')					
					->first();	

			$three = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',13)
					->orderBy('id','desc')					
					->first();
					
					
			$four = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',14)
					->orderBy('id','desc')					
					->first();

			$five = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',15)
					->orderBy('id','desc')					
					->first();			
         
        	$browse_url1 = $one['url'];
        	$browse_url2 = $two['url'];
        	$browse_url3 = $three['url']; 
			$browse_url4 = $four['url'];
        	$browse_url5 = $five['url'];   			
        
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
                   		$downloadLinks[] = $this->getTube8DownloadLink($browse_url1);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url1 ,$dowload_site3) ) {
                   
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url2 ,$dowload_site1) ){
                	if(!empty($browse_url2)) {
                    	$downloadLinks[] =$this->getShareVideosDownloadLink($browse_url2);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url2 ,$dowload_site2) ) {
                	if(!empty($browse_url2)) {
                   $downloadLinks[] = $this->getTube8DownloadLink($browse_url2);
                     }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url2 ,$dowload_site3) ) {
                    
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url3 ,$dowload_site1) ){
                	if(!empty($browse_url3)) {
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url3);
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
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url5);
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
				
				
				
        
		    return view('backend.userv2.fc2home_three')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('one',$one)
			->with('two',$two)
			->with('three',$three)
			->with('four',$four)
			->with('five',$five)
			->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)
            ->with('downloadLinks' , $downloadLinks)
            ->with('ud',$user_id)
            ->with('rowid', $urls['id']);
		}	    	
    }


	
	public function index_four()
    {
    	$c = date('Y-m-d');
	  	$user_id = Auth::user()->id;
		
		
		$total_pending_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'done')
					->count();
					
					
		$total_pending  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'done')
					->count();			
		
		
		$urls =  URLEntryTwo::where('user_id',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
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
		
		$count = URLEntryTwo::where('user_id',$user_id)
		->whereDate('sdate','=',$c)
		->orderBy('id','desc')->count();
		
        $qry = URLEntryTwo::get();
    	$cnt = $qry->count();
        $downloadLinks[] = '';
        $dloads = collect($downloadLinks);
		if($count == 0 ){       		
          return view('backend.userv2.fc2_blank_home')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('urls',$urls) 
			->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)
           ->with('downloadLinks' , $dloads)
          ->with('ud',$user_id)
          ->with('rowid', 0)
          ; 
        
		}else{        
        	$dowload_site1 = "share-videos";
   			$dowload_site2 = "tube8.com";
   			$dowload_site3 = "jp.pornhub.com";   
        
		 
			$one = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',16)
					->orderBy('id','desc')					
					->first();
					
			$two = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',17)
					->orderBy('id','desc')					
					->first();	

			$three = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',18)
					->orderBy('id','desc')					
					->first();	
			$four = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',19)
					->orderBy('id','desc')					
					->first();	

			$five = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',20)
					->orderBy('id','desc')					
					->first();			
					
        	$browse_url1 = $one['url'];
			$browse_url2 = $two['url'];
			$browse_url3 = $three['url'];
			$browse_url4 = $four['url'];
			$browse_url5 = $five['url'];
        
        	$downloadLinks = [];
                          
                 
        		if( strpos($browse_url1 ,$dowload_site1) ){
                	if(!empty($browse_url1 )) {
                  	$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url1 );
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url1  ,$dowload_site2) ) {
                	if(!empty($browse_url1 )) {
                   		$downloadLinks[] = $this->getTube8DownloadLink($browse_url1 );
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url1  ,$dowload_site3) ) {
                   
                		$downloadLinks[] = '#';
                    
                } 
        
         
		 
				if( strpos($browse_url2 ,$dowload_site1) ){
                	if(!empty($browse_url2 )) {
                  	$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url2 );
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url2  ,$dowload_site2) ) {
                	if(!empty($browse_url2 )) {
                   		$downloadLinks[] = $this->getTube8DownloadLink($browse_url2 );
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url2  ,$dowload_site3) ) {
                   
                		$downloadLinks[] = '#';
                    
                } 
		 
		 
		 
		 if( strpos($browse_url3 ,$dowload_site1) ){
                	if(!empty($browse_url3 )) {
                  	$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url3 );
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url3  ,$dowload_site2) ) {
                	if(!empty($browse_url3 )) {
                   		$downloadLinks[] = $this->getTube8DownloadLink($browse_url3 );
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url3  ,$dowload_site3) ) {
                   
                		$downloadLinks[] = '#';
                    
                } 
		 
		 if( strpos($browse_url4 ,$dowload_site1) ){
                	if(!empty($browse_url4 )) {
                  	$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url4 );
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url4  ,$dowload_site2) ) {
                	if(!empty($browse_url4 )) {
                   		$downloadLinks[] = $this->getTube8DownloadLink($browse_url4 );
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url4  ,$dowload_site3) ) {
                   
                		$downloadLinks[] = '#';
                    
                } 
		 
		 
		 
		 if( strpos($browse_url5 ,$dowload_site1) ){
                	if(!empty($browse_url5 )) {
                  	$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url5 );
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url5  ,$dowload_site2) ) {
                	if(!empty($browse_url5 )) {
                   		$downloadLinks[] = $this->getTube8DownloadLink($browse_url5 );
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url5  ,$dowload_site3) ) {
                   
                		$downloadLinks[] = '#';
                    
                } 
		 
		 
        
		    return view('backend.userv2.fc2home_four')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('one',$one)
			->with('two',$two)
			->with('three',$three)
			->with('four',$four)
			->with('five',$five)
->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)			
            ->with('downloadLinks' , $downloadLinks)
            ->with('ud',$user_id)
            ->with('rowid', $urls['id']);
		}	    	
    }



	public function index_five()
    {
    	$c = date('Y-m-d');
	  	 $user_id = Auth::user()->id;
		
		
		$total_pending_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'done')
					->count();
					
					
		$total_pending  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'done')
					->count();			
		
		
		
		$urls =  URLEntryTwo::where('user_id',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
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
		
		$count = URLEntryTwo::where('user_id',$user_id)
		->whereDate('sdate','=',$c)
		->orderBy('id','desc')
		->count();
		
        $qry = URLEntryTwo::get();
    	$cnt = $qry->count();
        $downloadLinks[] = '';
        $dloads = collect($downloadLinks);
		if($count == 0 ){       		
          return view('backend.userv2.fc2_blank_home')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('one',$one) 
			->with('two',$two) 
			->with('three',$three)
->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)			
           ->with('downloadLinks' , $dloads)
          ->with('ud' , $user_id)
          ->with('rowid', ''); 
        
		}else{    


		
        	$dowload_site1 = "share-videos";
   			$dowload_site2 = "tube8.com";
   			$dowload_site3 = "jp.pornhub.com";   
        
         
		 $one = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',21)
					->orderBy('id','desc')					
					->first();
					
			$two = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',22)
					->orderBy('id','desc')					
					->first();	

			$three = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',23)
					->orderBy('id','desc')					
					->first();
					
			$four = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',24)
					->orderBy('id','desc')					
					->first();	

			$five = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',25)
					->orderBy('id','desc')					
					->first();		
		 
		 
        	$browse_url1 = $one['url'] ;
        	$browse_url2 = $two['url'];
        	$browse_url3 = $three['url'];
        	$browse_url4 = $four['url'];
        	$browse_url5 = $five['url'];
        	  
        
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
                   		$downloadLinks[] = $this->getTube8DownloadLink($browse_url1);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url1 ,$dowload_site3) ) {
                   
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url2 ,$dowload_site1) ){
                	if(!empty($browse_url2)) {
                    	$downloadLinks[] =$this->getShareVideosDownloadLink($browse_url2);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url2 ,$dowload_site2) ) {
                	if(!empty($browse_url2)) {
                   $downloadLinks[] = $this->getTube8DownloadLink($browse_url2);
                     }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url2 ,$dowload_site3) ) {
                    
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url3 ,$dowload_site1) ){
                	if(!empty($browse_url3)) {
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url3);
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
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url5);
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
		
		
		
            $rowid = $urls['id'];
				
		   return view('backend.userv2.fc2home_five')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('one',$one)
			->with('two',$two)
			->with('three',$three)
			->with('four',$four)
			->with('five',$five)
			->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)
            ->with('downloadLinks' , $downloadLinks)
            ->with('ud' , $user_id)
            ->with('rowid', $rowid ); 
		}	    	
    }
	
	
	public function index_six()
    {
    	$c = date('Y-m-d');
	  	 $user_id = Auth::user()->id;
		
		
		$total_pending_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'done')
					->count();
					
					
		$total_pending  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'done')
					->count();			
		
		
		
		$urls =  URLEntryTwo::where('user_id',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
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
		
		$count = URLEntryTwo::where('user_id',$user_id)
		->whereDate('sdate','=',$c)
		->orderBy('id','desc')
		->count();
		
        $qry = URLEntryTwo::get();
    	$cnt = $qry->count();
        $downloadLinks[] = '';
        $dloads = collect($downloadLinks);
		if($count == 0 ){       		
          return view('backend.userv2.fc2_blank_home')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('one',$one) 
			->with('two',$two) 
			->with('three',$three) 
			->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)
           ->with('downloadLinks' , $dloads)
          ->with('ud' , $user_id)
          ->with('rowid', ''); 
        
		}else{    


		
        	$dowload_site1 = "share-videos";
   			$dowload_site2 = "tube8.com";
   			$dowload_site3 = "jp.pornhub.com";   
        
         
		 $one = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',26)
					->orderBy('id','desc')					
					->first();
					
			$two = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',27)
					->orderBy('id','desc')					
					->first();	

			$three = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',28)
					->orderBy('id','desc')					
					->first();
					
			$four = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',29)
					->orderBy('id','desc')					
					->first();	

			$five = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',30)
					->orderBy('id','desc')					
					->first();					
		 
		 
        	$browse_url1 = $one['url'] ;
        	$browse_url2 = $two['url'];
        	$browse_url3 = $three['url'];
			$browse_url4 = $four['url'];
        	$browse_url5 = $five['url'];
        	 
        
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
                   		$downloadLinks[] = $this->getTube8DownloadLink($browse_url1);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url1 ,$dowload_site3) ) {
                   
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url2 ,$dowload_site1) ){
                	if(!empty($browse_url2)) {
                    	$downloadLinks[] =$this->getShareVideosDownloadLink($browse_url2);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url2 ,$dowload_site2) ) {
                	if(!empty($browse_url2)) {
                   $downloadLinks[] = $this->getTube8DownloadLink($browse_url2);
                     }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url2 ,$dowload_site3) ) {
                    
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url3 ,$dowload_site1) ){
                	if(!empty($browse_url3)) {
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url3);
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
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url5);
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

				
        
            $rowid = $urls['id'];
				
		   return view('backend.userv2.fc2home_six')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('one',$one)
			->with('two',$two)
			->with('three',$three)
			->with('four',$four)
			->with('five',$five)
			->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)
            ->with('downloadLinks' , $downloadLinks)
            ->with('ud' , $user_id)
            ->with('rowid', $rowid ); 
		}	    	
    }


	public function index_seven()
    {
    	$c = date('Y-m-d');
	  	 $user_id = Auth::user()->id;
		
		
		
		$total_pending_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'done')
					->count();
					
					
		$total_pending  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'done')
					->count();			
		
		
		$urls =  URLEntryTwo::where('user_id',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
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
		
		$count = URLEntryTwo::where('user_id',$user_id)
		->whereDate('sdate','=',$c)
		->orderBy('id','desc')
		->count();
		
        $qry = URLEntryTwo::get();
    	$cnt = $qry->count();
        $downloadLinks[] = '';
        $dloads = collect($downloadLinks);
		if($count == 0 ){       		
          return view('backend.userv2.fc2_blank_home')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('one',$one) 
			->with('two',$two) 
			->with('three',$three) 
			->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)
           ->with('downloadLinks' , $dloads)
          ->with('ud' , $user_id)
          ->with('rowid', ''); 
        
		}else{    


		
        	$dowload_site1 = "share-videos";
   			$dowload_site2 = "tube8.com";
   			$dowload_site3 = "jp.pornhub.com";   
        
         
		 $one = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',31)
					->orderBy('id','desc')					
					->first();
					
			$two = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',32)
					->orderBy('id','desc')					
					->first();	

			$three = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',33)
					->orderBy('id','desc')					
					->first();
					
			$four = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',34)
					->orderBy('id','desc')					
					->first();		
			
			$five = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',35)
					->orderBy('id','desc')					
					->first();
			
			
		 
        	$browse_url1 = $one['url'] ;
        	$browse_url2 = $two['url'];
        	$browse_url3 = $three['url'];
        	$browse_url4 = $four['url'];
        	$browse_url5 = $five['url']; 
        
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
                   		$downloadLinks[] = $this->getTube8DownloadLink($browse_url1);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url1 ,$dowload_site3) ) {
                   
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url2 ,$dowload_site1) ){
                	if(!empty($browse_url2)) {
                    	$downloadLinks[] =$this->getShareVideosDownloadLink($browse_url2);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url2 ,$dowload_site2) ) {
                	if(!empty($browse_url2)) {
                   $downloadLinks[] = $this->getTube8DownloadLink($browse_url2);
                     }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url2 ,$dowload_site3) ) {
                    
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url3 ,$dowload_site1) ){
                	if(!empty($browse_url3)) {
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url3);
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
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url5);
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
				
				
        
            $rowid = $urls['id'];
				
		   return view('backend.userv2.fc2home_seven')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('one',$one)
			->with('two',$two)
			->with('three',$three)
			->with('four',$four)
			->with('five',$five)
			->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)
            ->with('downloadLinks' , $downloadLinks)
            ->with('ud' , $user_id)
            ->with('rowid', $rowid ); 
		}	    	
    }



	public function index_eight()
    {
    	$c = date('Y-m-d');
	  	 $user_id = Auth::user()->id;
		
		
		$total_pending_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'done')
					->count();
					
					
		$total_pending  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'done')
					->count();			
		
		
		
		$urls =  URLEntryTwo::where('user_id',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
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
		
		$count = URLEntryTwo::where('user_id',$user_id)
		->whereDate('sdate','=',$c)
		->orderBy('id','desc')
		->count();
		
        $qry = URLEntryTwo::get();
    	$cnt = $qry->count();
        $downloadLinks[] = '';
        $dloads = collect($downloadLinks);
		if($count == 0 ){       		
          return view('backend.userv2.fc2_blank_home')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('one',$one) 
			->with('two',$two) 
			->with('three',$three) 
			->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)
           ->with('downloadLinks' , $dloads)
          ->with('ud' , $user_id)
          ->with('rowid', ''); 
        
		}else{    


		
        	$dowload_site1 = "share-videos";
   			$dowload_site2 = "tube8.com";
   			$dowload_site3 = "jp.pornhub.com";   
        
         
		 $one = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',36)
					->orderBy('id','desc')					
					->first();
					
			$two = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',37)
					->orderBy('id','desc')					
					->first();	

			$three = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',38)
					->orderBy('id','desc')					
					->first();
					
			$four = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',39)
					->orderBy('id','desc')					
					->first();


			$five = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',40)
					->orderBy('id','desc')					
					->first();					
		 
		 
        	$browse_url1 = $one['url'] ;
			$browse_url2 = $two['url'] ;
			$browse_url3 = $three['url'] ;
        	$browse_url4 = $four['url'];
        	$browse_url5 = $five['url'];
        	 
        
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
                   		$downloadLinks[] = $this->getTube8DownloadLink($browse_url1);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url1 ,$dowload_site3) ) {
                   
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url2 ,$dowload_site1) ){
                	if(!empty($browse_url2)) {
                    	$downloadLinks[] =$this->getShareVideosDownloadLink($browse_url2);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url2 ,$dowload_site2) ) {
                	if(!empty($browse_url2)) {
                   $downloadLinks[] = $this->getTube8DownloadLink($browse_url2);
                     }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url2 ,$dowload_site3) ) {
                    
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url3 ,$dowload_site1) ){
                	if(!empty($browse_url3)) {
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url3);
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
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url5);
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

				
        
            $rowid = $urls['id'];
				
		   return view('backend.userv2.fc2home_eight')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('one',$one)
			->with('two',$two)
			->with('three',$three)
			->with('four',$four)
			->with('five',$five)
			->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)
            ->with('downloadLinks' , $downloadLinks)
            ->with('ud' , $user_id)
            ->with('rowid', $rowid ); 
		}	    	
    }	
	
	
	
	public function index_nine()
    {
    	$c = date('Y-m-d');
	  	 $user_id = Auth::user()->id;
		
		
		$total_pending_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'done')
					->count();
					
					
		$total_pending  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'done')
					->count();			
		
		
		$urls =  URLEntryTwo::where('user_id',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
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
		
		$count = URLEntryTwo::where('user_id',$user_id)
		->whereDate('sdate','=',$c)
		->orderBy('id','desc')
		->count();
		
        $qry = URLEntryTwo::get();
    	$cnt = $qry->count();
        $downloadLinks[] = '';
        $dloads = collect($downloadLinks);
		if($count == 0 ){       		
          return view('backend.userv2.fc2_blank_home')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('one',$one) 
			->with('two',$two) 
			->with('three',$three)
->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)			
           ->with('downloadLinks' , $dloads)
          ->with('ud' , $user_id)
          ->with('rowid', ''); 
        
		}else{    


		
        	$dowload_site1 = "share-videos";
   			$dowload_site2 = "tube8.com";
   			$dowload_site3 = "jp.pornhub.com";   
        
         
		 $one = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',41)
					->orderBy('id','desc')					
					->first();
					
			$two = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',42)
					->orderBy('id','desc')					
					->first();	

			$three = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',43)
					->orderBy('id','desc')					
					->first();
					
			$four = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',44)
					->orderBy('id','desc')					
					->first();


			$five = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',45)
					->orderBy('id','desc')					
					->first();					
		 
		 
        	$browse_url1 = $one['url'] ;
			$browse_url2 = $two['url'] ;
			$browse_url3 = $three['url'] ;
        	$browse_url4 = $four['url'];
        	$browse_url5 = $five['url'];
        	 
        
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
                   		$downloadLinks[] = $this->getTube8DownloadLink($browse_url1);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url1 ,$dowload_site3) ) {
                   
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url2 ,$dowload_site1) ){
                	if(!empty($browse_url2)) {
                    	$downloadLinks[] =$this->getShareVideosDownloadLink($browse_url2);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url2 ,$dowload_site2) ) {
                	if(!empty($browse_url2)) {
                   $downloadLinks[] = $this->getTube8DownloadLink($browse_url2);
                     }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url2 ,$dowload_site3) ) {
                    
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url3 ,$dowload_site1) ){
                	if(!empty($browse_url3)) {
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url3);
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
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url5);
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

				
        
            $rowid = $urls['id'];
				
		   return view('backend.userv2.fc2home_nine')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('one',$one)
			->with('two',$two)
			->with('three',$three)
			->with('four',$four)
			->with('five',$five)
			->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)
            ->with('downloadLinks' , $downloadLinks)
            ->with('ud' , $user_id)
            ->with('rowid', $rowid ); 
		}	    	
    }		
	
	
	
	public function index_ten()
    {
    	$c = date('Y-m-d');
	  	 $user_id = Auth::user()->id;
		
		
		$total_pending_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done_today = URLEntryTwo::where('user_id',$user_id)
					->whereDate('sdate' , '=' , $c)
					->where('status' , '=' ,'done')
					->count();
					
					
		$total_pending  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'pending')
					->count();
					
		$total_done  = URLEntryTwo::where('user_id',$user_id)					 
					->where('status' , '=' ,'done')
					->count();			
		
		
		
		$urls =  URLEntryTwo::where('user_id',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
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
		
		$count = URLEntryTwo::where('user_id',$user_id)
		->whereDate('sdate','=',$c)
		->orderBy('id','desc')
		->count();
		
        $qry = URLEntryTwo::get();
    	$cnt = $qry->count();
        $downloadLinks[] = '';
        $dloads = collect($downloadLinks);
		if($count == 0 ){       		
          return view('backend.userv2.fc2_blank_home')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('one',$one) 
			->with('two',$two) 
			->with('three',$three)
->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)			
           ->with('downloadLinks' , $dloads)
          ->with('ud' , $user_id)
          ->with('rowid', ''); 
        
		}else{    


		
        	$dowload_site1 = "share-videos";
   			$dowload_site2 = "tube8.com";
   			$dowload_site3 = "jp.pornhub.com";   
        
         
		 $one = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',46)
					->orderBy('id','desc')					
					->first();
					
			$two = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',47)
					->orderBy('id','desc')					
					->first();	

			$three = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',48)
					->orderBy('id','desc')					
					->first();
					
			$four = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',49)
					->orderBy('id','desc')					
					->first();


			$five = URLEntryTwo::where('user_id','=',$user_id)
        			->select(['id','url','title_url','title','thumbnail','sdate','status','user_id' ])
					->whereDate('sdate','=',$c)
					->where('url_no' ,'=',50)
					->orderBy('id','desc')					
					->first();					
		 
		 
        	$browse_url1 = $one['url'] ;
			$browse_url2 = $two['url'] ;
			$browse_url3 = $three['url'] ;
        	$browse_url4 = $four['url'];
        	$browse_url5 = $five['url'];
        	 
        
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
                   		$downloadLinks[] = $this->getTube8DownloadLink($browse_url1);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url1 ,$dowload_site3) ) {
                   
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url2 ,$dowload_site1) ){
                	if(!empty($browse_url2)) {
                    	$downloadLinks[] =$this->getShareVideosDownloadLink($browse_url2);
                    }else{
                    	$downloadLinks[] = '#';
                    }
                }
                else if( strpos($browse_url2 ,$dowload_site2) ) {
                	if(!empty($browse_url2)) {
                   $downloadLinks[] = $this->getTube8DownloadLink($browse_url2);
                     }else{
                    	$downloadLinks[] = '#';
                    }
                }           
                else if( strpos($browse_url2 ,$dowload_site3) ) {
                    
                		$downloadLinks[] = '#';
                    
                } 
        
        
        		if( strpos($browse_url3 ,$dowload_site1) ){
                	if(!empty($browse_url3)) {
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url3);
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
                  		$downloadLinks[] =  $this->getShareVideosDownloadLink($browse_url5);
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

				
        
            $rowid = $urls['id'];
				
		   return view('backend.userv2.fc2home_ten')
            ->with('msg1',$msg1)
            ->with('msg2',$msg2)
			->with('one',$one)
			->with('two',$two)
			->with('three',$three)
			->with('four',$four)
			->with('five',$five)
			->with('total_pending_today' , $total_pending_today)
		->with('total_done_today' , $total_done_today)
		->with('total_pending' , $total_pending)
		->with('total_done' , $total_done)
            ->with('downloadLinks' , $downloadLinks)
            ->with('ud' , $user_id)
            ->with('rowid', $rowid ); 
		}	    	
    }	
	
	
	public function change_task_status($user_id , $rowid , $sdate )
    {
		
        $query = URLEntryTwo::whereDate('sdate','=',$sdate)
						->where('user_id','=',$user_id)
						->where('id' ,'=', $rowid);
        
        
        //echo $query->count();
        if($query->count() == 1 ) {            
           URLEntryTwo::whereDate('sdate','=',$sdate)
				->where('user_id','=',$user_id)
				->where('id' ,'=', $rowid)
				->update([ 'status'  => 'done' ]);            
			//	echo 1;
        }  
        return redirect('/user/home');
    }
	
}
