<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Explanation;
use App\AudioSetting;
use App\QuestionAnswerRequest;
use DB; 

class QuestionAnswerController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
        $e = Explanation::where('type','=','question_answer')->first();
        $audios = AudioSetting::where('content_page','=','question_answer')->get();
       return view('backend.user.question_answer.question_answer_page')
                ->with('e',$e)
                ->with('audios',$audios) ;
    }    

 
	 
 
    public function user_request(Request $r)
    {
        //dd($r->all());
        $validator = \Validator::make($r->all(),[			
			'name' => 'required' ,
			'email' => 'required' ,
			'message' => 'required' 			 
		]);
		
	    $name = trim($r->input("name"));
		$email = trim($r->input("email"));  
		$message = trim($r->input("message"));  
		
		if ($validator->fails()) {
            return redirect()->action('User\QuestionAnswerController@index')
                        ->withErrors($validator)
                        ->withInput();
        } 
        
        
        $qa = new QuestionAnswerRequest();
        $qa->name = $name;
        $qa->email = $email;
        $qa->message = $message;
        $qa->created_at = date('Y-m-d H:i:s');     
        $qa->updated_at = date('Y-m-d H:i:s');    
        $qa->save();
		 return redirect()->action('User\QuestionAnswerController@index')->with('success','Your request sent!');
    }
 
}
