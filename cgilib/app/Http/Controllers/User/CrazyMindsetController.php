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

class CrazyMindsetController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
        $e = Explanation::where('type','=','crazy_mindset')->first();
        $audios = AudioSetting::where('content_page','=','crazy_mindset')->get();
        $vidoes = VideoSetting::where('content_page','=','crazy_mindset')->get();
        
       return view('backend.user.crazy_mindset.crazy_mindset_page')
                ->with('e',$e)
           ->with('audios' , $audios)
           ->with('vidoes' , $vidoes);
    }    

 
	 
 
    
 
}
