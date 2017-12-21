<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Explanation;
use App\VideoSetting;
use App\MembershipPowerFeedback;
use App\MembershipPowerUserFeedback;
use App\MembershipPowerFeebackRequestForm;
use DB; 

class MembershipPowerController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
        $e = Explanation::where('type','=','membership_power')->first();
        $videos = VideoSetting::where('content_page','=','membership_power')->get();
        return view('backend.user.membership_power.membership_power_page')
                ->with('e',$e)
                ->with('videos',$videos);
    }    

 
    public function membersip_power_feedback_list_json()
	{
	    
	    $mpf = MembershipPowerFeedback::orderBy('id','desc')->get();
	    
	    $html = '';
	    
	    $user_id = \Auth::user()->id;
	    
	    foreach($mpf as $m){
	        
	        $yvote = MembershipPowerUserFeedback::where('feedback_id','=',$m->id)->where('vote_for','=','yes')->count();
	        $nvote = MembershipPowerUserFeedback::where('feedback_id','=',$m->id)->where('vote_for','=','no')->count();

        $html .= '    
		<div class="col-md-12">
          <div class="box box-primary">'.
        
	    '<div class="box-header with-border">
              <h3 class="box-title">'. $m->title .'</h3>
        </div>
        <div class="box-body">
                <p>Date: '. $m->created_at .'</p>
                <p>Details:</p>'.   $m->description .'
        </div>    '. csrf_field() .'
            <input type="hidden" name="feedback_id" id="feedback_id" value="'.$m->id.'"/>
            <table style="margin-left:10px;" width="60%">
               <tr>
                    <td width="90%" style="height:45px;background-color:#D8DFEA;border:1px solid #39579A;"><input style="margin-left:10px;" type="radio" name="comments" value="yes"/> Agree</td>
                    <td style="width:2px;">&nbsp;</td>
                    <td style="height:45px;background-color:#D8DFEA;border:1px solid #39579A;width:50px;" id="news_yes_vote'.$m->id.'">+'.$yvote.'</td>
               </tr>
               <tr><td style="height:1px;" colspan="3">&nbsp;</td></tr>
               <tr>
                    <td width="90%" style="height:45px;background-color:#D8DFEA;border:1px solid #39579A;"><input style="margin-left:10px;" type="radio" name="comments" value="no"/> Disagree</td>
                    <td style="width:2px;">&nbsp;</td>
                    <td style="height:45px;background-color:#D8DFEA;border:1px solid #39579A;width:50px;" id="news_not_vote'.$m->id.'">+'.$nvote.'</td>
               </tr>
            </table>
            <br/>'.
         '</div>
        </div> ';
	    }
	    
	    $data = array('data'=>$html);
	    
        return response($data)
                ->header("Access-Control-Allow-Origin", "*")
                ->header("Access-Control-Allow-Credentials", true)
                ->header("Access-Control-Allow-Methods", "PUT, POST, GET, OPTIONS, DELETE");
	}
	
	
	
	public function membership_power_make_poll(Request $r)
	{
	    $feedback_id = trim($r->input("feedback_id"));
	    $vote_for = trim($r->input("vote_for"));
	    $user_id = \Auth::user()->id;
	    
	    $ncc = MembershipPowerUserFeedback::where('feedback_id','=',$feedback_id)
	                    ->where('user_id','=',$user_id)
	                    ->count();
	                    
        if( $ncc == 0 ) {
    	    $n = new MembershipPowerUserFeedback();
    	    $n->feedback_id = $feedback_id;
    	    $n->user_id = $user_id;
    	    $n->vote_for = $vote_for;
    	    $n->created_at = date('Y-m-d H:i:s');
    	    $n->updated_at = date('Y-m-d H:i:s');
    	    $n->save();
    	    echo 1;
        }else{
            echo 0;
        }
	    
	}
	
	
	public function membership_power_feedback_request_form(Request $r)
	{
	    $m = new MembershipPowerFeebackRequestForm();
	    $m->feedback_id = $r->input("feedback_id");
	    $m->name = $r->input("name");
	    $m->email = $r->input("email");
	    $m->message = $r->input("message");
	    $m->created_at = date("Y-m-d H:i:s");
	    $m->updated_at = date("Y-m-d H:i:s");
	    $m->save();
	    echo 1;
	    //    dd($r->all());
	}
    
 
}
