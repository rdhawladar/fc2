<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Explanation;
use App\AudioSetting;
use App\VideoSetting;
use DB; 

class KnowRealtimeEarningController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
        $e = Explanation::where('type','=','know_realtime_earning')->first();
        
        $audios = AudioSetting::where('content_page','=','know_realtime_earning')->get();
        $vidoes = VideoSetting::where('content_page','=','know_realtime_earning')->get();
        
       return view('backend.user.realtime_earning.realtime_earning_page')
                ->with('e',$e)
           ->with('audios' , $audios)
           ->with('vidoes' , $vidoes);
    }    

 
	 
 
    
 
}
