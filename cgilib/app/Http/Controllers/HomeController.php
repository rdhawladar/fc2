<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\URLEntry;
use App\URLEntryTwo;
use DB; 

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class HomeController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
	 	
		return view('backend.user.home_page');				
        //echo "user home"; 
    }     
	 
	public function getJpPornHubTitleThumbnailImage($url)
    {
    	//http://softsys24x7.com/stats/testjphub.html
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
        
      	$title = $d[16];
    	$title = str_replace('"video_title":"','',$title);
    	echo $title = str_replace('"','',$title);
    	echo "<br/>";
    
    	$thumb = $d[15];
    	$thumb =	str_replace('"image_url":"','',$thumb);
        $thumb =	str_replace('"','',$thumb);
    
    	echo	$thumb =	str_replace('\\','',$thumb);
    	echo "<br/><img src='". $thumb . "'/>";
		 
        echo '<form method="post" action="'. url("/user/user-thumbnail-download/"   )  .'">'.
				csrf_field() . 
				'<input type="hidden" name="thumbnail" value="'. $thumb .'"/>'.
				
				'<input type="submit" class="btn btn-xs btn-primary" value="Download Thumbnail"/>
		</form>';
    }



	//for www.tube8.com
	public function getTube8TitleThumbnail($browse_url)
    {
    	 
        //  $browse_url = "https://www.tube8.com/threesome/teen-seduces-roommate-into-threesome-fuck/35075281/";
        //"https://www.tube8.com/amateur/18-year-old-college-babe-sucks-my-cock-and-gets-a-oral-creampie/36682601/";
    	//echo  $browse_url = "https://www.tube8.com/amateur/incredibly-cute-and-hot-teen-fucked-%28barely-18%29/37264551/";
        echo "</br>";
        $filter_title     = "h1";
    	$filter_thumbnail = "meta";
        $client = new Client();
        $goutteClient = new Client();
        $guzzleClient = new GuzzleClient(array(
        		          'timeout' => 1000,
                	    ));
        $goutteClient->setClient($guzzleClient);
    	$crawler = $goutteClient->request('GET', $browse_url);	
        
    	$title_data = $crawler->filter($filter_title)->each(function ($node) {
         	return $node->text() ;
        });	

       	$thumbnail_data = $crawler->filter($filter_thumbnail)->each(function ($node) {
         	return $node->attr('content') ;
        });	
    	
    	echo  $title = $title_data[0];
    	echo "<br/>";
        echo $thumbnail = $thumbnail_data[2];
        echo '<br/><img src="'. $thumbnail .'"/><br/> ' ;
		echo '<form method="post" action="'. url("/user/user-thumbnail-download/"   )  .'">'.
				csrf_field() . 
				'<input type="hidden" name="thumbnail" value="'. $thumbnail .'"/>'.
				
				'<input type="submit" class="btn btn-xs btn-primary"  value="Download Thumbnail"/>
		</form>';		
		
    }


	public function getShareVideosTitleThumbnail($titleUrl)
    {
      	$filter_title     = "h3";
    	$filter_thumbnail = "meta";
        $client1 = new Client();
        $goutteClient1 = new Client();
        $guzzleClient1 = new GuzzleClient(array(
        		          'timeout' => 1000,
                	    ));
        $goutteClient1->setClient($guzzleClient1);
    	$crawler1 = $goutteClient1->request('GET', $titleUrl);	
    	$title_data = $crawler1->filter($filter_title)->each(function ($node) {
         	return $node->text() ;
        });
    	$thumbnail_data = $crawler1->filter(".itemImage > img")->each(function ($node) {
         	return $node->attr('src') ;
        });
        echo $title = $title_data[0] .'<br/>'; 
        echo $thumbnail = "http:".$thumbnail_data[0] ;
    	echo "<br/><img src='". $thumbnail ."'/><br/>";
		
		echo '<form method="post" action="'. url("/user/user-thumbnail-download/"   )  .'">'.
				csrf_field() . 
				'<input type="hidden" name="thumbnail" value="'. $thumbnail .'"/>'.
				
				'<input type="submit" class="btn btn-xs btn-primary"  value="Download Thumbnail"/>
		</form>';
    	   
    }

	public function copy_url($rowid,$titleid)
    {
        $url = URLEntryTwo::find($rowid);
        if(!empty($url)) 
        {
             if($titleid == 1)
             {
                 $url =  $url->title_url;
             }
             else if($titleid == 2) 
             {
                $url =   $url->title_url;
             }
             else if($titleid == 3) 
             {
                $url =   $url->title_url;
             }
             else if($titleid == 4) 
             {
                $url =   $url->title_url;
             }
             else if($titleid == 5) 
             {
                $url =   $url->title_url;
             }
             else if($titleid == 6) 
             {
                $url =   $url->title_url;
             }
             else if($titleid == 7) 
             {
                $url =   $url->title_url;
             }
             else if($titleid == 8) 
             {
                $url =   $url->title_url;
             }
             else if($titleid == 9) 
             {
                $url =   $url->title_url;
             }
             else if($titleid == 10) 
             {
                $url =   $url->title_url;
             }else{
                 $url =  "";
             }
                          
             $Title = array();
             $Thumb = array();             
             $data = "";
             
             if(!empty($url)) 
             {
             		$title_site1 = "movie.eroterest";
					$title_site2 = "tube8";
					$title_site3 = "jp.pornhub";             
             	
               		if( strpos($url ,$title_site1) ){
    					$this->getShareVideosTitleThumbnail($url);
					}
					else if( strpos($url ,$title_site2) ) {
        				$this->getTube8TitleThumbnail($url);
					}           
   					else if( strpos($url ,$title_site3) ) {
        				//$this->getJpPornHubTitleThumbnailImage($url);
					} 
            }
             
           // print_r($url);
        }
    }
	
	 
 

	public function thumbnailImageDownload(Request $r)
	{
		$url = trim($r->input('thumbnail'));
		header("Cache-Control: no");
		header("Content-Type: application/octet-stream");
		//header("Content-Length: ". filesize($url));
		header("Content-Disposition: attachment; filename=". basename($url));
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');  
		// Output file.
		readfile ($url);                   
		exit();
	}
	
	
	public function getUsers()
	{
		$users = User::orderBy('id' , 'desc')->all();
		return Datatables::of($users)->make(true);
	}

	
	
}
