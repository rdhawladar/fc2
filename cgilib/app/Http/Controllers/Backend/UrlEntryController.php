<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\URLEntry;
use App\URLEntryTwo;
use App\UserMessages;
use App\User;
use DB;


class UrlEntryController extends Controller
{
    public function index()
    {	    
		$users = User::all();
		return view('backend.adminv2.url_entry')->with('users' , $users);
	}
	

	public function check_user_url(Request $r) 
    {
    	$user_id = trim($r->input("user_id"));
    	$sdate   = trim($r->input("user_id"));
    	$url     = trim($r->input("user_id"));
        
        $counter = URLEntryTwo::whereDate('sdate' , '=' , $sdate) 
        		->where('user_id', '=' , $user_id) 
        		->where('url' , '=' , $url )
        		->count();
       return $counter;
    }
	
	
	public function check_row_detail(Request $r) 
	{
		$user_id 	= trim($r->input("user_id"));		 
		$date 		= trim($r->input("sdate"));
		$sdate 		= date("Y-m-d" , strtotime($date));
		
		$result = URLEntryTwo::whereDate('sdate' , '=' , $sdate) 
						->where('user_id', '=' , $user_id)
						->orderBy('url_no' , 'asc')
						->get();	
						
		 
		
		$res = array(); 
		foreach($result as $r){
		   $res[] = array(
				'url' => $r->url ,
				'title_url' => $r->title_url ,
				'url_no' => $r->url_no 
		   );
		} 
		header("Content-type: application/json"); 
		echo json_encode(array('data' => $res)); 
	}
	


	public function url_entry(Request $r) {
		 
		  $sdate 	   = trim($r->input("date"));
		  $date = date('Y-m-d' , strtotime($sdate));
		  $cdate = date('Y-m-d H:i:s');
		  
		  $user_id 	   = trim($r->input("user_id"));
		  
		  
		  $url1 	   = trim($r->input("url1"));
		  $url1_title  = trim($r->input("url1_title"));
		   
		  
		  $url2 	   = trim($r->input("url2"));
		  $url2_title  = trim($r->input("url2_title"));
		  
		  $url3 	   = trim($r->input("url3"));
		  $url3_title  = trim($r->input("url3_title"));
		  
		  $url4 	   = trim($r->input("url4"));
		  $url4_title  = trim($r->input("url4_title"));
		  
		  $url5 	   = trim($r->input("url5"));
		  $url5_title  = trim($r->input("url5_title"));
		  
		  $url6 	   = trim($r->input("url6"));
		  $url6_title  = trim($r->input("url6_title"));
		  
		  $url7 	   = trim($r->input("url7"));
		  $url7_title  = trim($r->input("url7_title"));
		  
		  $url8 	   = trim($r->input("url8"));
		  $url8_title  = trim($r->input("url8_title"));
		  
		  $url9 	   = trim($r->input("url9"));
		  $url9_title  = trim($r->input("url9_title"));
		  
		  $url10 	   = trim($r->input("url10"));
		  $url10_title = trim($r->input("url10_title"));
		  
		  
		  
		  
		  $url11 	   = trim($r->input("url11"));
		  $url11_title  = trim($r->input("url11_title"));
		   
		  
		  $url12 	   = trim($r->input("url12"));
		  $url12_title  = trim($r->input("url12_title"));
		  
		  $url13 	   = trim($r->input("url13"));
		  $url13_title  = trim($r->input("url13_title"));
		  
		  $url14 	   = trim($r->input("url14"));
		  $url14_title  = trim($r->input("url14_title"));
		  
		  $url15 	   = trim($r->input("url15"));
		  $url15_title  = trim($r->input("url15_title"));
		  
		  $url16 	   = trim($r->input("url16"));
		  $url16_title  = trim($r->input("url16_title"));
		  
		  $url17 	   = trim($r->input("url17"));
		  $url17_title  = trim($r->input("url17_title"));
		  
		  $url18 	   = trim($r->input("url18"));
		  $url18_title  = trim($r->input("url18_title"));
		  
		  $url19 	   = trim($r->input("url19"));
		  $url19_title  = trim($r->input("url19_title"));
		  
		  $url20 	   = trim($r->input("url20"));
		  $url20_title = trim($r->input("url20_title"));	




		  $url21 	   = trim($r->input("url21"));
		  $url21_title  = trim($r->input("url21_title"));
		   
		  
		  $url22 	   = trim($r->input("url22"));
		  $url22_title  = trim($r->input("url22_title"));
		  
		  $url23 	   = trim($r->input("url23"));
		  $url23_title  = trim($r->input("url23_title"));
		  
		  $url24 	   = trim($r->input("url24"));
		  $url24_title  = trim($r->input("url24_title"));
		  
		  $url25 	   = trim($r->input("url25"));
		  $url25_title  = trim($r->input("url25_title"));
		  
		  $url26 	   = trim($r->input("url26"));
		  $url26_title  = trim($r->input("url26_title"));
		  
		  $url27 	   = trim($r->input("url27"));
		  $url27_title  = trim($r->input("url27_title"));
		  
		  $url28 	   = trim($r->input("url28"));
		  $url28_title  = trim($r->input("url28_title"));
		  
		  $url29 	   = trim($r->input("url29"));
		  $url29_title  = trim($r->input("url29_title"));
		  
		  $url30 	   = trim($r->input("url30"));
		  $url30_title = trim($r->input("url30_title"));
		  

		  $url31 	   = trim($r->input("url31"));
		  $url31_title  = trim($r->input("url31_title"));
		   
		  
		  $url22 	   = trim($r->input("url32"));
		  $url22_title  = trim($r->input("url32_title"));
		  
		  $url33 	   = trim($r->input("url33"));
		  $url33_title  = trim($r->input("url33_title"));
		  
		  $url34 	   = trim($r->input("url34"));
		  $url34_title  = trim($r->input("url34_title"));
		  
		  $url35 	   = trim($r->input("url35"));
		  $url35_title  = trim($r->input("url35_title"));
		  
		  $url36 	   = trim($r->input("url36"));
		  $url36_title  = trim($r->input("url36_title"));
		  
		  $url37 	   = trim($r->input("url37"));
		  $url37_title  = trim($r->input("url37_title"));
		  
		  $url38 	   = trim($r->input("url38"));
		  $url38_title  = trim($r->input("url38_title"));
		  
		  $url39 	   = trim($r->input("url39"));
		  $url39_title  = trim($r->input("url39_title"));
		  
		  $url40 	   = trim($r->input("url40"));
		  $url40_title = trim($r->input("url40_title"));		  
		  
		  

			$url41 	   = trim($r->input("url41"));
		  $url41_title  = trim($r->input("url41_title"));
		   
		  
		  $url42 	   = trim($r->input("url42"));
		  $url42_title  = trim($r->input("url42_title"));
		  
		  $url43 	   = trim($r->input("url43"));
		  $url43_title  = trim($r->input("url43_title"));
		  
		  $url44 	   = trim($r->input("url44"));
		  $url44_title  = trim($r->input("url44_title"));
		  
		  $url45 	   = trim($r->input("url45"));
		  $url45_title  = trim($r->input("url45_title"));
		  
		  $url46 	   = trim($r->input("url46"));
		  $url46_title  = trim($r->input("url46_title"));
		  
		  $url47 	   = trim($r->input("url47"));
		  $url47_title  = trim($r->input("url47_title"));
		  
		  $url48 	   = trim($r->input("url48"));
		  $url48_title  = trim($r->input("url48_title"));
		  
		  $url49 	   = trim($r->input("url49"));
		  $url49_title  = trim($r->input("url49_title"));
		  
		  $url50 	   = trim($r->input("url50"));
		  $url50_title = trim($r->input("url50_title"));		  
		  
		  
		
		
		
		  
		  
		  
		  if(!empty($url1 )) {
			$c1 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 1)					
					->count();
			if($c1 == 0) {		
			  $u = new URLEntryTwo();
			  $u->sdate = $date;
			  $u->user_id = $user_id;
			  $u->url = $url1;
			  $u->title_url = $url1_title;		  
			  $u->title = '';
			  $u->thumbnail = '';
			  $u->url_no = 1;
			  $u->status = 'pending';
			  $u->created_at = $cdate;
			  $u->updated_at = $cdate;
			  $u->save();
			}
		  }
		  
		  
		  if(!empty($url2 )) {
		  $c2 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 2)					
					->count();
			if($c2 == 0) {	
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url2;
		  $u->title_url = $url2_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 2;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		  }
		  
		  if(!empty($url3 )) {
		  $c3 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 3)					
					->count();
			if($c3 == 0) {	
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url3;
		  $u->title_url = $url3_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 3;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		  }
		  
		  
		  if(!empty($url4 )) {
		  $c4 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 4)					
					->count();
			if($c4 == 0) {	
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url4;
		  $u->title_url = $url4_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 4;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		  }
		  
		  
			if(!empty($url5 )) {
			$c5 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 5)					
					->count();
			if($c5 == 0) {	
			
			$u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url5;
		  $u->title_url = $url5_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 5;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
			}
 
		if(!empty($url6 )) {
		
		$c6 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 6)					
					->count();
			if($c6 == 0) {	
		
			$u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url6;
		  $u->title_url = $url6_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 6;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		}
 
 
		if(!empty($url7 )) {
		
		$c7 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 7)					
					->count();
			if($c7 == 0) {	
			$u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url7;
		  $u->title_url = $url7_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 7;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		}
 
		if(!empty($url8 )) {
		$c8 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 8)					
					->count();
			if($c8 == 0) {	
			$u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url8;
		  $u->title_url = $url8_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 8;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
				}
		}
		  
		if(!empty($url9 )) { 
		$c9 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 9)					
					->count();
			if($c9 == 0) {			
			$u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url9;
		  $u->title_url = $url9_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 9;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		}  
		
		if(!empty($url10 )) {
			$c10 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 10)					
					->count();
			if($c10 == 0) {			
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url10;
		  $u->title_url = $url10_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 10;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		}  
		
		
		if(!empty($url11 )) {
	$c11 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 11)					
					->count();
			if($c11 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url11;
		  $u->title_url = $url11_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 11;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		}  
		
		
		
		if(!empty($url12 )) {	
		
			$c12 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 12)					
					->count();
			if($c12 == 0) {	
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url12;
		  $u->title_url = $url12_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 12;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		}  
		
		
		if(!empty($url13 )) {

	$c13 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 13)					
					->count();
			if($c13 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url13;
		  $u->title_url = $url13_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 13;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		}  
		
		
		if(!empty($url14 )) {	
		
			$c14 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 14)					
					->count();
			if($c14 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url14;
		  $u->title_url = $url14_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 14;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		}  
		
		
		if(!empty($url15 )) {	
		
		
			$c15 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 15)					
					->count();
			if($c15 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url15;
		  $u->title_url = $url15_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 15;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		}  
		
		if(!empty($url16 )) {


	$c16 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 16)					
					->count();
			if($c16 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url16;
		  $u->title_url = $url16_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 16;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		}  
		
		
		
		if(!empty($url17 )) {

			$c17 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 17)					
					->count();
			if($c17 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url17;
		  $u->title_url = $url17_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 17;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		} 


		if(!empty($url18 )) {	
		
		
				$c18 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 18)					
					->count();
			if($c18 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url18;
		  $u->title_url = $url18_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 18;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		} 


		if(!empty($url19 )) {	
		
			$c19 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 19)					
					->count();
			if($c19 == 0) {	
		
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url19;
		  $u->title_url = $url19_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 19;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		}  
		
		
		if(!empty($url20 )) {


	$c20 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 20)					
					->count();
			if($c20 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url20;
		  $u->title_url = $url20_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 20;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		}  		
		
		
		if(!empty($url21 )) {	
		
		
		
	$c21 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 21)					
					->count();
			if($c21 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url21;
		  $u->title_url = $url21_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 21;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		}  
		
		
		if(!empty($url22 )) {	
		
		
			
	$c22 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 22)					
					->count();
			if($c22 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url22;
		  $u->title_url = $url22_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 22;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		}  
		
		
		if(!empty($url23 )) {



	$c23 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 23)					
					->count();
			if($c23 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url23;
		  $u->title_url = $url23_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 23;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		  
		}  
		
		
		if(!empty($url24 )) {


	
	$c24 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 24)					
					->count();
			if($c24 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url24;
		  $u->title_url = $url24_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 24;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		  
		}


		if(!empty($url25 )) {	
		
		
		
	$c25 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 25)					
					->count();
			if($c25 == 0) {	
		
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url25;
		  $u->title_url = $url25_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 25;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		  
		  
		}  



		if(!empty($url26 )) {	
		
			
	$c26 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 26)					
					->count();
			if($c26 == 0) {	
		
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url26;
		  $u->title_url = $url26_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 26;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		} 



		if(!empty($url27 )) {



			$c27 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 27)					
					->count();
			if($c27 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url27;
		  $u->title_url = $url27_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 27;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		  
		}  


		if(!empty($url28 )) {

			
	$c28 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 28)					
					->count();
			if($c28 == 0) {	

		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url28;
		  $u->title_url = $url28_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 28;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		  
		} 



		if(!empty($url29 )) {	
		
		
	$c29 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 29)					
					->count();
			if($c29 == 0) {	
		
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url29;
		  $u->title_url = $url29_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 29;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		  
		  
		}  

		if(!empty($url30 )) {	
		
		
			
	$c30 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 30)					
					->count();
			if($c30 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url30;
		  $u->title_url = $url30_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 30;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		  
		}    		
		
 		if(!empty($url31 )) {


	$c31 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 31)					
					->count();
			if($c31 == 0) {	

		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url31;
		  $u->title_url = $url31_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 31;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		  
		}    		
		
		if(!empty($url32 )) {


	$c32 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 32)					
					->count();
			if($c32 == 0) {	

		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url32;
		  $u->title_url = $url32_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 32;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		  
		}  


		if(!empty($url33 )) {	
		
		
			$c33 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 33)					
					->count();
			if($c33 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url33;
		  $u->title_url = $url33_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 33;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		  
		}    		
		

		if(!empty($url34 )) {


	$c34 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 34)					
					->count();
			if($c34 == 0) {	

		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url34;
		  $u->title_url = $url34_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 34;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		  
		}    		
		  		
		if(!empty($url35 )) {	
		
		
			$c35 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 35)					
					->count();
			if($c35 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url35;
		  $u->title_url = $url35_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 35;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		  
		}    		
				
		
		if(!empty($url36 )) {


	$c36 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 36)					
					->count();
			if($c36 == 0) {	

		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url36;
		  $u->title_url = $url36_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 36;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		}    		
		

		if(!empty($url37 )) {

	$c37 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 37)					
					->count();
			if($c37 == 0) {	

		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url37;
		  $u->title_url = $url37_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 37;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		  
		}    		
				
		if(!empty($url38 )) {

	$c38 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 38)					
					->count();
			if($c38 == 0) {	

		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url38;
		  $u->title_url = $url38_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 38;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		  
		}    		
		

		if(!empty($url39 )) {

	$c39 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 39)					
					->count();
			if($c39 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url39;
		  $u->title_url = $url39_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 39;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		}    		
		

		if(!empty($url40 )) {


	$c40 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 40)					
					->count();
			if($c40 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url40;
		  $u->title_url = $url40_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 40;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		}    		
		
		
		if(!empty($url41 )) {


	$c41 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 41)					
					->count();
			if($c41 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url41;
		  $u->title_url = $url41_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 41;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		}    	

		if(!empty($url42 )) {


	$c42 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 42)					
					->count();
			if($c42 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url42;
		  $u->title_url = $url42_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 42;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  }
		}    
		
		if(!empty($url43 )) {


	$c43 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 43)					
					->count();
			if($c43 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url43;
		  $u->title_url = $url43_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 43;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		}    		
		
			
		if(!empty($url44 )) {

		
	$c44 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 44)					
					->count();
			if($c44 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url44;
		  $u->title_url = $url44_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 44;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		}    


		if(!empty($url45 )) {


	$c45 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 45)					
					->count();
			if($c45 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url45;
		  $u->title_url = $url45_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 45;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		}    		
		
		if(!empty($url46 )) {



	$c46 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 46)					
					->count();
			if($c46 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url46;
		  $u->title_url = $url46_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 46;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		}    

		if(!empty($url47 )) {


	$c47 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 47)					
					->count();
			if($c47 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url47;
		  $u->title_url = $url47_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 47;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		}  

		if(!empty($url48 )) {


	$c48 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 48)					
					->count();
			if($c48 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url48;
		  $u->title_url = $url48_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 48;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		} 


		if(!empty($url49 )) {


	$c49 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 49)					
					->count();
			if($c49 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url49;
		  $u->title_url = $url49_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 49;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		} 


		if(!empty($url50 )) {


	$c50 = URLEntryTwo::whereDate('sdate' , '=' , $date)
					->where('user_id' ,'=', $user_id)					 
					->where('url_no' , '=' , 50)					
					->count();
			if($c50 == 0) {	
		
		  $u = new URLEntryTwo();
		  $u->sdate = $date;
		  $u->user_id = $user_id;
		  $u->url = $url50;
		  $u->title_url = $url50_title;		  
		  $u->title = '';
		  $u->thumbnail = '';
		  $u->url_no = 50;
		  $u->status = 'pending';
		  $u->created_at = $cdate;
		  $u->updated_at = $cdate;
		  $u->save();
		  
		  }
		}       		

  		
	
		 return redirect()->action('Backend\UrlEntryController@index')
				->with('success','Data saved successfuly');
	}
	
	
	
	
	public function getUsers(Request $r)
	{
		$sdate = trim($r->input("sdate"));
		$date = date('Y-m-d' , strtotime($sdate));
		
		$urlentry_users = URLEntryTwo::select(['user_id'])
		->whereDate('sdate' ,'=', $date)
		->orderBy('id' , 'asc')
		->get();
		$urlentry_users_list = collect($urlentry_users);
					 
		$data = User::whereNotIn('id' , $urlentry_users_list)
		->get();
		 
	 
		$options = '';
		$options = '<option value="">-- Select User --</option>';
		foreach($data as $d) 
		{
			$options .= '<option value="'. $d->id .'">'. $d->nick_name . '</option>';
		}
		echo $options;  
	}
	
	
	
	public function members_jobs($user_id,$month)
	{	     
		$monthEnd = date("Y-m-d", strtotime("-1 month" , strtotime($month))) ;
		$monthName = date('M-Y' , strtotime($month)); 
		
		$current_date = date('Y-m-d');
				
		$data = User::leftJoin('urlentry' ,'urlentry.user_id','=','users.id')
		->select(['urlentry.id','urlentry.sdate','urlentry.url','urlentry.title_url','urlentry.url_no',
                  'urlentry.status','users.nick_name','users.email','users.readable_password'])
		->where('urlentry.user_id','=',$user_id)
		->whereBetween('urlentry.sdate', [$monthEnd , $current_date])		 
		->get();	
    
     //   dd($data); 
        
		return view('backend.adminv2.users_job_list') 
        ->with('start' , $current_date )
        ->with('end' , $monthEnd )
        ->with('data' , $data); 
	}
	
	public function members_peding_jobs($userid , $month)
	{
	 	$monthEnd = date("Y-m-t", strtotime($month)) ;
		
		$data = User::leftJoin('urlentry' ,'urlentry.user_id','=','users.id')
		->select(['urlentry.id','urlentry.sdate','urlentry.url','urlentry.title_url','urlentry.url_no','urlentry.status',
                  'users.nick_name','users.email','users.readable_password'])
		->where('urlentry.user_id','=',$userid)
		->whereBetween('urlentry.sdate', [$month , $monthEnd])
		->where('urlentry.status','=' ,'pending')
		->get();
				
		return view('backend.adminv2.users_pending_list')
		->with('data',$data);		
	}
	
	
	public function members_done_jobs($userid , $month)
	{
	 	$monthEnd = date("Y-m-t", strtotime($month)) ;
		
		$data = User::leftJoin('urlentry' ,'urlentry.user_id','=','users.id')
		->select(['urlentry.id','urlentry.sdate','urlentry.url','urlentry.title_url','urlentry.url_no','urlentry.status','users.nick_name','users.email','users.readable_password'])
		->where('urlentry.user_id','=',$userid)
		->whereBetween('urlentry.sdate', [$month , $monthEnd])
		->where('urlentry.status','=' ,'done')
		->get();
				
		return view('backend.adminv2.users_done_list')
		->with('data',$data);		
	}
	
	
	
	
	
}
