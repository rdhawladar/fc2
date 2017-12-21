<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Explanation;
use App\Qualification; 
use App\VideoSetting;
use App\MajimeTerroristRequest;    
use DB; 

class MajimeTerroristController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
        $e = Explanation::where('type','=','majime_terrorist')->first();
        $q = Qualification::all();
        $vidoes = VideoSetting::where('content_page','=','majime_terrorist')->get();
                      
       return view('backend.user.majme_terorist.majime_terorist_page')
                ->with('e',$e)
                ->with('q',$q)
           ->with('vidoes',$vidoes);
    }    

 
	 
    public function user_request(Request $r)
    {
        //dd($r->all());
        
        $validator = \Validator::make($r->all(),[			
			 
			'name' => 'required' ,
			'qualification' => 'required' 			 
		]);
		
	    $name = trim($r->input("name"));		 
		$qualification = trim($r->input("qualification"));  
		
		if ($validator->fails()) {
            return redirect()->action('User\MajimeTerroristController@index')
                        ->withErrors($validator)
                        ->withInput();
        } 
        
        $mc = MajimeTerroristRequest::where('name','=',$name)->count();
            
        if($mc == 0) {
            $m = new MajimeTerroristRequest();
            $m->name = $name;
            $m->profession  = $qualification;
            $m->created_at = date('Y-m-d H:i:s');
            $m->updated_at = date('Y-m-d H:i:s');
            $m->save();
            $msg = 'Your request sent!';
        }  else{
            $msg = 'Your have already requested!';
        }  
        
        return redirect()->action('User\MajimeTerroristController@index')->with('success',$msg);
    }
    
 
}
