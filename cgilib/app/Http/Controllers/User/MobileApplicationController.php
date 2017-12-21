<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\VideoSetting;
use App\Explanation;

use DB; 

class MobileApplicationController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
        $e = Explanation::where('type','=','mobile_application')->first();
        $videos = VideoSetting::where('content_page','=','mobile_application')->get();
       return view('backend.user.mobile_app.mobile_application_page')
                ->with('e',$e)
                ->with('videos',$videos);
    }    

 
	 
 
    
 
}
