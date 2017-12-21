<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\URLEntry;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class ScrapController extends Controller
{      

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
       // echo "<br/>";
	    //echo "Iframe Link: ". $src;
       // echo "<br/>";
    
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
    	echo "<br/>";
        $data = $iframeurldata[3];
    	$data = str_replace('\\','',$data);
        $p = explode(",",$data);
        $dl_url = $p[44];
        $dl_url = str_replace('"videoUrl":"' , '' , $dl_url );    
        $dl_url = str_replace('"}' , '' , $dl_url );    
        echo "Download URL Link: ". $dl_url;
  
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
    	
        echo "Title: ";
    	echo  $title = $title_data[0];
    	echo "<br/>Thumbnail: ";
        echo $thumbnail = $thumbnail_data[2];
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
        echo "<br/>";
    	echo "Download URL:". $data[1];
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
     	echo "<br/>";    
        echo $title = $title_data[0] .'<br/>'; 
        //echo "Thumbnail: http:";
        echo $thumbnail = "http:".$thumbnail_data[0] ;
    	echo "<br/>";
    	   
    }


	public function getJpPornHubTitleImage($url)
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
    	echo "<br/>";
        
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



   public function two_site_checking()
   {
   		$today = date('Y-m-d');
   		//echo  $browse_url = "http://share-videos.se/auto/video/63321247?uid=13";
   		$browse_url =  "http://share-videos.se/auto/video/63399980?uid=15";
        
        ///"http://softsys24x7.com/stats/testjphub.html";        
        //"https://www.tube8.com/threesome/teen-seduces-roommate-into-threesome-fuck/35075281/";
   
        $user = URLEntry::where('user_id',121)->where('sdate','=',$today)->orderBy('id','desc')->take(1)->first();
    	//echo $titleUrl = $user['url8_title'];    
        $titleUrl = $browse_url; 
   		    
   		$title_site1 = "movie.eroterest";
		$title_site2 = "tube8";
		$title_site3 = "jp.pornhub";	
   
   		$dowload_site1 = "share-videos";
   		$dowload_site2 = "tube8.com";
   		$dowload_site3 = "jp.pornhub.com";   
   
        if( strpos($titleUrl ,$title_site1) ){
    		$this->getShareVideosTitleThumbnail($titleUrl);
		}
		else if( strpos($titleUrl ,$title_site2) ) {
        	$this->getTube8TitleThumbnail($titleUrl);
		}           
   		else if( strpos($titleUrl ,$title_site3) ) {
        	//$this->getJpPornHubTitleImage($titleUrl);
		} else{
        	//$this->getJpPornHubTitleImage($titleUrl);
        }
   
   	
   		if( strpos($browse_url ,$dowload_site1) ){
    		$this->getShareVideosDownloadLink($browse_url);
		}
		else if( strpos($browse_url ,$dowload_site2) ) {
        	 $this->getTube8DownloadLink($browse_url);
		}           
   		else if( strpos($browse_url ,$dowload_site3) ) {
        	//$this->getJpPornHubDonwloadLink($browse_url);
		} else{
        	//$this->getJpPornHubDonwloadLink($browse_url);
        }
   }



	/*
        http://share-videos.se/
		https://www.tube8.com/
		https://jp.pornhub.com/    
       	*/


    public function index()
    {	
		return view("backend.adminv2.scrap_data");
    }  


	public function scrap_data(Request $r)
	{
		
		$site_url = trim($r->input("site_url"));
		
		//https://github.com/FriendsOfPHP/Goutte
		$client = new Client();
		$goutteClient = new Client();
		$guzzleClient = new GuzzleClient(array(
			'timeout' => 1000,
		));
		$goutteClient->setClient($guzzleClient);
		
		$crawler = $goutteClient->request('GET', $site_url);	
	
		$result = "";
	
		//	$crawler = $goutteClient->request('GET', 'https://movie.eroterest.net/page/693916/');	
		$crawler->filter('h3')->each(function ($node) {
			$result .= $node->text()."</br>";
		});	
		 
		$crawler->filter('.img-responsive')->each(function ($node) {
			$result .= $node->attr('src')."</br>";
		});
			
		echo  $result;
			
		//https://viblo.asia/p/laravel-url-preview-like-facebook-with-php-goutte-1VgZvBwmZAw
		//http://www.xvideos.com/video4383488/
	}
	
	
	
	
	
	
	public function checkScrap()
    {		
		$titleUrl == "https://movie.eroterest.net/page/300/";		
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
     	echo "<br/>";    
        echo $title = $title_data[0] .'<br/>'; 
        //echo "Thumbnail: http:";
        echo $thumbnail = "http:".$thumbnail_data[0] ;
    	echo "<br/>";
    	   
    }


	
	
	
}
