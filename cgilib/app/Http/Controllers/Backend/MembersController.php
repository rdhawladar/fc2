<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\URLEntry; 
use App\URLEntryTwo;
use App\CustomMember; 
use App\User; 
use Datatables; 
use DB;
 

class MembersController extends Controller
{     
 /*   public function __construct()
    {
        $this->middleware('auth');
    }      */
	
	
	public function index()
    {	
        //return view('backend.admin.members.member_registration');  
        return view('backend.adminv2.member_registration'); 
    }
	
	
	public function registration(Request $r)
	{		
		$user_name      = trim($r->input("user_name"));
		 
		$member_email    = trim($r->input("email"));
		$member_password = trim($r->input("password"));
		$member_encrypt_password = bcrypt(trim($r->input("password")));

               $fc2_account      = trim($r->input("fc2_account"));
               $fc2_password      = trim($r->input("fc2_password"));

		
		$validator = \Validator::make($r->all(), [
	            'user_name' => 'required',            
        	    'email' => 'required|email' ,
	            'password' => 'required' ,
        	    'fc2_account' => 'required' ,
	            'fc2_password' => 'required'
                ]);

        if ($validator->fails()) {
            //dd($validator);
            return redirect()->action('Backend\MembersController@index')
                        ->withErrors($validator)
                        ->withInput();
        }
		 
		$u = User::where('email','=',$member_email)->count();
		if($u == 0) 
		{
			$user = new User();	
			$user->first_name = $user_name;
			$user->last_name = $user_name;
			$user->nick_name = $user_name;
			$user->email = $member_email;
			$user->readable_password = $member_password;
			$user->password = $member_encrypt_password;
          		$user->premium_password = $fc2_password;
                        $user->premium_amount = 0.00;
                        $user->hobby = $fc2_account;
			$user->status = "ACTIVE";
			$user->created_at = date('Y-m-d H:i:s');
			$user->updated_at = date('Y-m-d H:i:s');
			$user->save();
			$msg = 'Data saved successfuly';
		}else{
		    $msg = 'User already exist';
		}
		
		return redirect()->action('Backend\MembersController@index')
				->with('success',$msg);
	}
	
	
	public function customer_member_registration()
	{
	    $users =  User::all();
	    return view("backend.admin.members.custom_member_registration")->with('users',$users);
	}
	
	public function custom_member_registration_action(Request $r)
	{  
        $user_id = trim($r->input("user_id"));
        $password =  trim($r->input("password"));
        
        $validator = \Validator::make($r->all(), [
            'user_id' => 'required',
            'password' => 'required',                    
        ]);

        if ($validator->fails()) {             
            return redirect()->action('Backend\MembersController@customer_member_registration')
                        ->withErrors($validator)
                        ->withInput();
        }
        
	    
	    $cc = User::where('id','=',$user_id)->where('premium_password','!=','')->count();        
        if($cc==0)
	    {
    	    $c = User::find($user_id);
    	    $c->premium_password = $password ;             
    	    $c->status = 'ACTIVE';
    	    $c->updated_at = date("Y-m-d H:i:s");
    	    $c->update();
    	    return redirect()->action('Backend\MembersController@customer_member_registration')
				->with('success','Data saved successfuly');
	    }
	    return redirect()->action('Backend\MembersController@customer_member_registration')
				->with('success','Member Already Exist');
	}
	
	public function members_list()
	{
		//return view("backend.admin.members.members_list");
		
		$pending_data_count =	User::leftJoin('urlentry' , 'urlentry.user_id' , '=' , 'users.id')	        
        		->groupBy('urlentry.user_id')
        		->where('urlentry.status' , '=' , 'pending')
        		->select(['users.id' , DB::raw('count(*) as pending_ct')])
        		->get();
    
    	$done_data_count = User::leftJoin('urlentry' , 'urlentry.user_id' , '=' , 'users.id')	        
        		->groupBy('urlentry.user_id')
        		->where('urlentry.status' , '=' , 'done')
        		->select(['users.id' , DB::raw('count(*) as done_ct')])
        		->get();
    
    
    	//URLEntryTwo
		
	    $total_done = URLEntry::where('dl_status1','=',1)
       ->orWhere('dl_status2','=',1)
       ->orWhere('dl_status3','=',1)
       ->orWhere('dl_status4','=',1)
       ->orWhere('dl_status5','=',1)
       ->orWhere('dl_status6','=',1)
       ->orWhere('dl_status7','=',1)
       ->orWhere('dl_status8','=',1)
       ->orWhere('dl_status9','=',1)
       ->orWhere('dl_status10','=',1)
       ->count();
		
		$members = User::where('id','!=',1)->orderBy('id','desc')->get();
		$urls = URLEntry::whereDate('sdate','=',date('Y-m-d'))->get();
    
		return view("backend.adminv2.members_list")
		->with('members',$members)
		->with('urls' , $urls)
		->with('total_done',$total_done)
        ->with('pdcount' , $pending_data_count)
        ->with('dcount' , $done_data_count);
	}
	
	public function members_list_data_table()
	{	
		$members = User::where('id','!=',1)->orderBy('id','desc')->get();
		return Datatables::of($members)
			->editColumn('id', function($result){
			   return  $result->nick_name   ;
			})
			->editColumn('status', function($result){
				if($result->status == "ACTIVE")
				return  "<span class='badge bg-green'>". $result->status ."</span>";
				else
				return  "<span class='badge bg-red'>". $result->status ."</span>";					
			})			
			->make(true);
	}
	
	
	public function members_jobs($user_id,$month)
	{
	    $U = User::find($user_id);
		$name = $U->nick_name;
		$month = date('M-Y' , strtotime($month)); 
		    
    	$start = $month;
        $end = date('Y-m-t' , strtotime($month));
    
    	$data =	User::leftJoin('urlentry' , 'urlentry.user_id' , '=' , 'users.id')	        
        		->groupBy('urlentry.user_id')
        		 
        		->select(['users.id' , 'users.nick_name' , 'users.email' , 'users.readable_password' , 'urlentry.url' ,
                          'urlentry.url_no' , 'urlentry.status' , 'urlentry.sdate'])
        		->get();
    
        echo $name . '  Month:'. $month;
    
		 $table = '<br/>
         	<table width="100%" border="0" cellpadding="3" cellspacing="3">
               <tr>
               <th>SL</th>
               <th>Name</th>
               <th>Email</th>
               <th>Date</th>
               <th>URL</th>
               <th>Status</th>
               </tr>
               ';
             foreach($data as $d) {
            $table .= '
               <tr>
                   <td style="border-top:1px solid #236236;height:30px;"> '. $d->url_no .'</td>
                   <td style="border-top:1px solid #236236;height:30px;"> '. $d->nick_name .'</td>
                   <td style="border-top:1px solid #236236;height:30px;"> '. $d->email .'</td>
                   <td style="border-top:1px solid #236236;height:30px;">'. $d->sdate .'</td>
                   <td style="border-top:1px solid #236236;height:30px;">'. $d->url .'</td>
                   <td style="border-top:1px solid #236236;height:30px;">'. $d->status .'</td>
               </tr> 
              ';
             }   
               
           $table .= '         
				<tr>
				<td  colspan="3">&nbsp;</td>
				</tr>			   
				 		   
            </table>';
            echo $table; 
		 
		
	}

}
