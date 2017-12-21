<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ExplanationType; 
use App\VideoSetting;
use App\URLEntry;
use DB; 
use Datatables;

class VideosController extends Controller
{     
    
    
    public function index()
    {	
         $users = User::where('id','>',1)->get();
        return view('backend.adminv2.video_entry') ->with('users',$users);    
        //return view('backend.admin.videos.video_entry') ->with('users',$users);
    }    

    
    public function video_entry(Request $r)
    {	

		//	date_default_timezone_set("Asia/Dhaka");
        //dd($r->all());
        $user_id  = trim($r->input("user_id"));
        $date  =  date("Y-m-d" ,strtotime(trim($r->input("date"))) );
		
		$ucount = URLEntry::where('sdate','=',$date)->where('user_id','=',$user_id)->count();
        $url1           = trim($r->input("url1"));
        $url1_title     = trim($r->input("url1_title"));
        $url2           = trim($r->input("url2"));
        $url2_title     = trim($r->input("url2_title"));
        $url3           = trim($r->input("url3"));
        $url3_title     = trim($r->input("url3_title"));
		$url4           = trim($r->input("url4"));
		$url4_title     = trim($r->input("url4_title"));
        $url5           = trim($r->input("url5"));
        $url5_title     = trim($r->input("url5_title"));
        $url6           = trim($r->input("url6"));
        $url6_title     = trim($r->input("url6_title"));
		$url7           = trim($r->input("url7"));
		$url7_title     = trim($r->input("url7_title"));
        $url8           = trim($r->input("url8"));
        $url8_title     = trim($r->input("url8_title"));
        $url9           = trim($r->input("url9"));
        $url9_title     = trim($r->input("url9_title"));
		$url10          = trim($r->input("url10"));
		$url10_title     = trim($r->input("url10_title"));
        
        
        $validator = \Validator::make($r->all(), [
            'user_id' => 'required',
            'date'    => 'required',   
            'url1'    => 'required', 
            'url1_title'    => 'required', 
            /*  'url2'    => 'required', 
            'url2_title'    => 'required', 
             'url3'    => 'required', 
            'url3_title'    => 'required', 
             'url4'    => 'required', 
            'url4_title'    => 'required', 
             'url5'    => 'required', 
            'url5_title'    => 'required', 
             'url6'    => 'required', 
            'url6_title'    => 'required', 
             'url7'    => 'required', 
            'url7_title'    => 'required', 
             'url8'    => 'required', 
            'url8_title'    => 'required', 
             'url9'    => 'required', 
            'url9_title'    => 'required',  
            'url10'    => 'required', 
            'url10_title'    => 'required'*/
        ]);

        if ($validator->fails()) {             
            return redirect()
                    ->action('Backend\VideosController@index')
                    ->withErrors($validator)
                    ->withInput();
        }
    
        $flag = 1;
    
    	/*
    
        $c1 = URLEntry::where('url1','=',$url1)->count();
        $c2 = URLEntry::where('url2','=',$url2)->count();
        $c3 = URLEntry::where('url3','=',$url3)->count();
        $c4 = URLEntry::where('url4','=',$url4)->count();
        $c5 = URLEntry::where('url5','=',$url5)->count();
        $c6 = URLEntry::where('url6','=',$url6)->count();
        $c7 = URLEntry::where('url7','=',$url7)->count();
        $c8 = URLEntry::where('url8','=',$url8)->count();
        $c9 = URLEntry::where('url9','=',$url9)->count();
        $c10 = URLEntry::where('url10','=',$url10)->count();
        
        if($c1>0) {
        $flag = 1;
        return redirect()->action('Backend\VideosController@index')
				->with('error_message','URL1 Exist!');
        }
        
         if($c2>0) {
        $flag = 1;
        return redirect()->action('Backend\VideosController@index')
				->with('error_message','URL2 Exist!');
        }
        
        
          if($c3>0) {
        $flag = 1;
        return redirect()->action('Backend\VideosController@index')
				->with('error_message','URL3 Exist!');
        }
        
          if($c4>0) {
        $flag = 1;
        return redirect()->action('Backend\VideosController@index')
				->with('error_message','URL4 Exist!');
        }
        
        
          if($c5>0) {
        $flag = 1;
        return redirect()->action('Backend\VideosController@index')
				->with('error_message','URL5 Exist!');
        }
        
          if($c6>0) {
        $flag = 1;
        return redirect()->action('Backend\VideosController@index')
				->with('error_message','URL6 Exist!');
        }
        
          if($c7>0) {
        $flag = 1;
        return redirect()->action('Backend\VideosController@index')
				->with('error_message','URL7 Exist!');
        }
        
          if($c8>0) {
        $flag = 1;
        return redirect()->action('Backend\VideosController@index')
				->with('error_message','URL8 Exist!');
        }
        
          if($c9>0) {
        $flag = 1;
        return redirect()->action('Backend\VideosController@index')
				->with('error_message','URL9 Exist!');
        }
        
        if($c10>0) {
        $flag = 1;
        return redirect()->action('Backend\VideosController@index')
				->with('error_message','URL10 Exist!');
        }
        */
    
    //if($ucount == 0 )     {
            $v = new URLEntry();
            $v->user_id = $user_id;
            $v->sdate    = $date;
            $v->url1              = $url1;
            $v->url1_title              = $url1_title;
			$v->dl_status1        = 0;
            $v->url2        = $url2;
            $v->url2_title              = $url2_title;
			$v->dl_status2        = 0;
            $v->url3       = $url3;
            $v->url3_title              = $url3_title;
			$v->dl_status3  = 0;
			$v->url4        = $url4;
			$v->url4_title              = $url4_title;
			$v->dl_status4  = 0;
            $v->url5        = $url5;
            $v->url5_title              = $url5_title;
			$v->dl_status5  = 0;
            $v->url6        = $url6;
            $v->url6_title              = $url6_title;
			$v->dl_status6  = 0;
			$v->url7        = $url7;
			$v->url7_title              = $url7_title;
			$v->dl_status7  = 0;
            $v->url8        = $url8;
            $v->url8_title              = $url8_title;
			$v->dl_status8  = 0;
            $v->url9        = $url9;
            $v->url9_title              = $url9_title;
			$v->dl_status9  = 0;
			$v->url10       = $url10;
			$v->url10_title              = $url10_title;
			$v->dl_status10 = 0;
			
            $v->created_at   = date('Y-m-d H:i:s');
            $v->updated_at   = date('Y-m-d H:i:s');
            $v->save();   

            return redirect()->action('Backend\VideosController@index')
				->with('success','Data saved successfuly');
    
       /*}else{
     		return redirect()->action('Backend\VideosController@index')
				->with('error_message','Data Already Exist For this User!');
       }	*/	
        
    }
    
    
    public function videos_owners_list(Request $r)
    {
        $reference_id  = trim($r->input("reference"));
        $users = User::where('id','!=',$reference_id)->select(['id','first_name','last_name'])->get();
         
        $html = '';
        foreach($users as $u) {
            $html .= '<option value="'. $u->id .'">'. $u->first_name.' '.$u->last_name .'</option>';
        }
        echo $html;
        //echo "ref-". $reference_id;
    }
	
    
    public function videos_list()
    {
        $videos = URLEntry::leftJoin('users','users.id','=','url_entry.user_id')  
                  ->select(['url_entry.id','url_entry.sdate','users.nick_name','url_entry.url1','url_entry.url2','url_entry.url3','url_entry.url4','url_entry.url5','url_entry.url6','url_entry.url7','url_entry.url8','url_entry.url9','url_entry.url10'])
                ->orderBy('url_entry.id','desc')
                ->get();
        return view("backend.adminv2.videos_list")->with('urls',$videos);
        //return view("backend.admin.videos.videos_list");
    }
    
    public function videos_list_data_table()
    {
        $videos = URLEntry::leftJoin('users','users.id','=','url_entry.user_id')  
                  ->select(['url_entry.id','url_entry.sdate','users.nick_name','url_entry.url1','url_entry.url2','url_entry.url3','url_entry.url4','url_entry.url5','url_entry.url6','url_entry.url7','url_entry.url8','url_entry.url9','url_entry.url10'])
                ->orderBy('url_entry.id','desc')
                ->get();
        
        //dd($events);
        return Datatables::of($videos)
            /*
            ->editColumn('id', function($result){
			   return  '<a class="btn btn-success" href="' .    url('/admin/news-edit/'.  $result->id )    .'">Edit</a>';
			})*/		 
			->make(true);
    }
    
	
}
