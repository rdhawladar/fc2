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

class WorldSecretTalkController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
        $e = Explanation::where('type','=','world_secret_talk')->first();
         $audios = AudioSetting::where('content_page','=','know_realtime_earning')->get();
        $vidoes = VideoSetting::where('content_page','=','know_realtime_earning')->get();
       
        
        
       return view('backend.user.secret_talk.secret_talk_of_wold_page')
                ->with('e',$e)
           ->with('audios' , $audios)
           ->with('vidoes' , $vidoes);
    }    

 
	 
 
    
 
}
