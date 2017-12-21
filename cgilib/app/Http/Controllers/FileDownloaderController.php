<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use Carbon\Carbon; 

class FileDownloaderController extends Controller
{     
    
	public function test_dl(Request $s)
	{
		//$s =  storage_path()."/video/animation01.mp4";
		//$s = storage_path()."/video/barsandtone.flv";
		//echo $s;
		$main_url = trim($s->input("url1")); //"http://dl.aviny.com/voice/marsieh/moharram/92/shab-02/mirdamad/mirdamad-m92-sh2-01.mp3";
		$file = basename($main_url);
		header("Content-disposition:attachment; filename=$file");
		readfile($main_url);
		exit();
		//return response()->download($s->input("url1"));
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
