<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Explanation;
use App\UserMessages;
use App\ExplanationType;
use DB;
use Datatables;
  

class ExplanationController extends Controller
{     
    
    public function index()
    {			
	   $users = User::where('id','>',1)->get();	
       //return view('backend.admin.explanation.explanation_entry')	   ->with('users',$users );
	   
	   return view('backend.adminv2.explanation_entry')
	   ->with('users',$users );
    }     
	 
	public function explanation_entry(Request $r)
	{
		$validator = \Validator::make($r->all(),[			
			'user_id' => 'required' ,
			'message_one' => 'required' ,
			'message_two' => 'required' 			 
		]);
		
		
	    $user_id = trim($r->input("user_id"));
		$msg1 = trim($r->input("message_one"));  
		$msg2 = trim($r->input("message_two"));  
		
		if ($validator->fails()) {
            return redirect()->action('Backend\ExplanationController@index')
                        ->withErrors($validator)
                        ->withInput();
        } 
		
        $cc = UserMessages::where('user_id',$user_id)->count();
        if($cc == 0) {
			$m = new UserMessages();
			$m->user_id = $user_id;
			$m->msg1 = $msg1;
			$m->msg2 = $msg2;
			$m->created_at = date('Y-m-d H:i:s');
			$m->updated_at = date('Y-m-d H:i:s');
			$m->save();
			$msg = 'Message saved successfuly';
        }else{
            
            	$msg = 'Message Already Exist!';
        }
		return redirect()->action('Backend\ExplanationController@index')
				->with('success',$msg); 
	}
	
	
	public function explanation_edit($id)
    {		
	  $users = User::where('id','>',1)->get();	
       $u = UserMessages::find($id);
        
	   return view('backend.adminv2.edit_explanation')
	   ->with('users',$users )
	   ->with('id',$id)
	   ->with('msg',$u); 
    } 
	
	
	public function explanation_edit_action(Request $r)
    {
        $id = trim($r->input("id"));
		if($id != "" ) 
		{
			$e = UserMessages::find($id);
			$e->user_id = trim($r->input("user_id"));
			$e->msg1 = trim($r->input("message_one"));
			$e->msg2 = trim($r->input("message_two"));
			$e->updated_at = date('Y-m-d H:i:s');
			$e->update();
		}
		
		
		return redirect('/admin/message-edit/'.$id )
				->with('success','Message updated successfuly'); 
		//		echo $r->input("exp_id");
	}	
	
	
	public function explanations_list()
    {
	//	return view('backend.admin.explanation.explation_list');
	    $exps = UserMessages::leftJoin('users','users.id','=','user_messages.user_id')
					->orderBy('user_messages.id','desc')
					->select(['user_messages.id','user_messages.msg1','user_messages.msg2','users.nick_name','users.email','user_messages.created_at'])
					->get();
		return view('backend.adminv2.explation_list')->with('list',$exps);
	}	
	
	public function explanations_data_table()
    {		
		$exps = UserMessages::leftJoin('users','users.id','=','user_messages.user_id')
					->orderBy('user_messages.id','desc')
					->select(['user_messages.id','user_messages.msg1','user_messages.msg2','users.nick_name','users.email','user_messages.created_at'])
					->get();
		return Datatables::of($exps)
		->editColumn('id', function($result){
			   return $result->nick_name;
			})		
			/*->editColumn('id', function($result){
			   return "<a class='btn btn-success' href='". url('/admin/explanation-edit/'.$result->id .'') ."'>Edit</a>";
			})*/
			->make(true);
    }     
	 
    
	
	

	
	
}
