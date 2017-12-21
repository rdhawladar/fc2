<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Explanation;
use App\VideoSetting;
use DB; 

class BitcoinRelatedLectureController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
        $e = Explanation::where('type','=','bitcoin_related_lecture')->first();
        
         $vidoes = VideoSetting::where('content_page','=','bitcoin_related_lecture')->get();
        
        
       return view('backend.user.bitcoin_related.bitcoin_related_lecture_page')
                    ->with('e',$e)->with('vidoes',$vidoes);
    }    

 
	 
 
    
 
}
