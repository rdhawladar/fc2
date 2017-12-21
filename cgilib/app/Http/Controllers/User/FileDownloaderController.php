<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use Carbon\Carbon; 

class FileDownloaderController extends Controller
{     

	public function download($url) 
    {
 		//$file = "http://example.com/go.exe"; 
		header("Content-Description: File Transfer"); 
		header("Content-Type: application/octet-stream"); 
		header("Content-Disposition: attachment; filename='" . basename($url) . "'"); 		 
		readfile ($url);
		exit;  
	}
    
	public function tube_download($url)
    {
    	set_time_limit(0);
		ini_set("display_errors","1");
		error_reporting(E_ALL);
    
        $parse = explode("?",$url);
		$filename_with_url = $parse[0];
		$parse2 = explode("/", $filename_with_url);
		$len = count($parse2);
		$name = $parse2[$len-1];
    
		//$main_url = "http://dl.aviny.com/voice/marsieh/moharram/92/shab-02/mirdamad/mirdamad-m92-sh2-01.mp3";
		$file = basename($url);
		header("Content-Transfer-Encoding: binary");
		header('Content-Type: application/octet-stream');
		header('Content-Type: application/force-download');
		header('Content-Type: application/mp4');
    	header('Content-Transfer-Encoding: binary');
		header("Content-disposition:attachment; filename=$name");
		readfile($url);
		exit;	 
    }

    
	public function test_dl(Request $s)
	{	    
	    $main_url = trim($s->input("url1"));
	      //$file = 'https://googledrive.com/host/0B_3oJnpnNoF9UjlkVUwtWE5CY0U/city.jpg';
    	$site1 = "v24.share-videos";//"movie.eroterest";
		$site2 = "jp.pornhub";
		$site3 = "ep.t8cdn";    
    	if( strpos($main_url ,$site1)  ) {
    		$this->download($main_url);
		}
		else if( strpos($main_url ,$site3) ){
    	    $this->tube_download($main_url);
		}else{
        	$this->download($main_url);
        }
        
	}
		
	
    public function index()
    {	        
        /*
            //DateTime Manipulation
            $carbon = new Carbon();
            $carbon->setTimezone('Asia/Dhaka');        
            $t = $carbon->format('Y-m-d H:i A');
            //echo $t;

            $date1 = "2017-09-29";
            $date1 = Carbon::parse($date1);        
            $n = Carbon::now();        
            $diff = $n->diffInDays($date1);        
            echo $diff;
        */
        
        
        // File Download 
        //echo public_path()."<br/>". storage_path();
        //$s = Storage::url('readme.txt');
        //return response()->download($s);
    }     
	
	
}
