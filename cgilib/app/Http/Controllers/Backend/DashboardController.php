<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq;
use App\User;
use App\Packages;
use App\Vdo;
use App\URLEntry;
use App\URLEntryTwo;
use App\UserMessages;
use App\PackageWiseVideoAssign;

use DB;
use Datatables; 
 

class DashboardController extends Controller
{     
       
	
	public function index()
    {	
      $total_users = User::all()->count();
    
      $today = date('Y-m-d');
    
      $today_done = URLEntryTwo::whereDate('sdate' ,'=' , $today)
            ->where('status' ,'=' , 'done')
      		->count();

      $today_pending = URLEntryTwo::whereDate('sdate' ,'=' , $today)
            ->where('status' ,'=' , 'pending')
      		->count();
    
    
        
        $noOfMsg = UserMessages::count();
        
        //return view('backend.admin.home_page');  
        return view('backend.adminv2.dashboard')
        ->with('total_users', $total_users)
        ->with('today_done', $today_done)
        ->with('today_pending', $today_pending)
        ->with('total_msg', $noOfMsg) ;  
    }

    //show-report
    public function show_report()
    {
        $users = User::where('id','>',1)->get();
        return view('backend.adminv2.show_report')->with('users',$users);
    }
    
	
	 public function pending_report()
    {
        $users = User::where('id','>',1)->get();
        return view('backend.adminv2.pending_report')
		->with('users',$users);
    }
    
	
	 public function done_report()
    {
        $users = User::where('id','>',1)->get();
        return view('backend.adminv2.done_report')->with('users',$users);
    }
    
	
	
    
    public function getReportData(Request $r)
    {  
        $user_id = trim($r->input("user_id"));
        $date = trim($r->input("sdate"));
        
        $sdate  = date('Y-m-d' , strtotime($date));
                 
        $c = URLEntry::where('sdate','=' ,  $sdate)->where('user_id','=',$user_id)->count();
           
        if($c > 0 ) {
        
            $User =  URLEntry::where('sdate','=' ,  $sdate)->where('user_id','=',$user_id)->first();            
             if($User['dl_status1']  == 0){
                   $s1 = 'PENDING';
            }else{
             $s1 = 'DONE';
            }
            
            
             if($User['dl_status2']  == 0){
                   $s2 = 'PENDING';
            }else{
             $s2 = 'DONE';
            }
            
            
             if($User['dl_status3']  == 0){
                   $s3 = 'PENDING';
            }else{
             $s3 = 'DONE';
            }
            
             if($User['dl_status4']  == 0){
                   $s4 = 'PENDING';
            }else{
             $s4 = 'DONE';
            }
             if($User['dl_status5']  == 0){
                   $s5 = 'PENDING';
            }else{
             $s5 = 'DONE';
            }
             if($User['dl_status6']  == 0){
                   $s6 = 'PENDING';
            }else{
             $s6 = 'DONE';
            }
             if($User['dl_status7']  == 0){
                   $s7 = 'PENDING';
            }else{
             $s7 = 'DONE';
            }
             if($User['dl_status8']  == 0){
                   $s8 = 'PENDING';
            }else{
             $s8 = 'DONE';
            }
             if($User['dl_status9']  == 0){
                   $s9 = 'PENDING';
            }else{
             $s9 = 'DONE';
            }
             if($User['dl_status10']  == 0){
                   $s10 = 'PENDING';
            }else{
             $s10 = 'DONE';
            }
            
            
            $table = 
            '<table width="100%" border="0" cellpadding="3" cellspacing="3">
               <tr>
               <th>SL</th>
               <th>URL</th>
               <th>Status</th>
               </tr>
               <tr>
                   <td style="border-top:1px solid #236236;height:30px;">URL 1</td>
                   <td style="border-top:1px solid #236236;height:30px;height:30px;">'. $User['url1'] .'</td>
                   <td style="border-top:1px solid #236236;height:30px;">'.  
                   
                  $s1
                   
                   .'</td>
               </tr>
               <tr>
                   <td style="border-top:1px solid #236236;height:30px;height:30px;">URL 2</td>
                   <td style="border-top:1px solid #236236;height:30px;">'. $User['url2'] .'</td>
                   <td style="border-top:1px solid #236236;height:30px;">'. $s2.'</td>
               </tr>
               <tr>
                   <td style="border-top:1px solid #236236;height:30px;height:30px;">URL 3</td>
                   <td style="border-top:1px solid #236236;height:30px;">'. $User['url3'] .'</td>
                   <td style="border-top:1px solid #236236;height:30px;">'.$s3.'</td>
               </tr>
               <tr>
                   <td style="border-top:1px solid #236236;height:30px;">URL 4</td>
                   <td style="border-top:1px solid #236236;height:30px;">'. $User['url4'] .'</td>
                   <td style="border-top:1px solid #236236;height:30px;">'.$s4.'</td>
               </tr>
               <tr>
                   <td style="border-top:1px solid #236236;height:30px;height:30px;">URL 5</td>
                   <td style="border-top:1px solid #236236;height:30px;">'. $User['url5'] .'</td>
                   <td style="border-top:1px solid #236236;height:30px;">'.$s5.'</td>
               </tr>               
               <tr>
                   <td style="border-top:1px solid #236236;height:30px;height:30px;">URL 6</td>
                   <td style="border-top:1px solid #236236;height:30px;">'. $User['url6'] .'</td>
                   <td style="border-top:1px solid #236236;height:30px;">'.$s6.'</td>
               </tr>        
               <tr>
                   <td style="border-top:1px solid #236236;height:30px;">URL 7</td>
                   <td style="border-top:1px solid #236236;height:30px;">'. $User['url7'] .'</td>
                   <td style="border-top:1px solid #236236;height:30px;">'.$s7.'</td>
               </tr>        
               <tr>
                   <td style="border-top:1px solid #236236;height:30px;">URL 8</td>
                   <td style="border-top:1px solid #236236;height:30px;">'. $User['url8'] .'</td>
                   <td style="border-top:1px solid #236236;height:30px;">'.$s8.'</td>
               </tr>        
               <tr>
                   <td style="border-top:1px solid #236236;height:30px;">URL 9</td>
                   <td style="border-top:1px solid #236236;height:30px;">'. $User['url9'] .'</td>
                   <td style="border-top:1px solid #236236;height:30px;">'.$s9.'</td>
               </tr>        
               
               <tr>
                   <td style="border-top:1px solid #236236;height:30px;">URL 10</td>
                   <td style="border-top:1px solid #236236;height:30px;">'. $User['url10'] .'</td>
                   <td style="border-top:1px solid #236236;height:30px;">'.$s10 .'</td>
               </tr>                              
            </table>';
            echo $table;
            
        }else{
            echo  'No records found!';
        }
    }
	
	
	
	
	public function getPendingReportData(Request $r)
    {  
        $date = trim($r->input("sdate"));
        $sdate  = date('Y-m-d' , strtotime($date));
		
		$ids = URLEntryTwo::select(['user_id'])
		->whereDate('urlentry.sdate' , '=' , $sdate)
		->where('urlentry.status' , '=' , 'pending')
		->distinct('user_id')
		->get();
		
		
		$pending_list = collect($ids);
	    
		
		$query = URLEntryTwo::select(['user_id'])
		->whereDate('urlentry.sdate' , '=' , $sdate)
		->where('urlentry.status' , '=' , 'pending')
		->distinct('user_id'); 		 
		
		if($query->count() > 0 ){		
			$data = User::whereIn('id' , $pending_list)->get();
				  

			$total = 0;
				  
            $table = 
            '<table  width="100%" border="0" cellpadding="3" cellspacing="3">
               <tr>               
               <th>User</th>
			   <th>Email</th>
			   <th>Password</th>
				<th>Pending Task</th>			   
                ';
			   
			foreach($data as $d){  
			$sub_total  = URLEntryTwo::where('user_id' , '=' , $d->id ) 
					->whereDate('sdate' , '=' , $sdate)
					->where('status' ,'=' , 'pending')
					->count();
					
			$table .='   
               </tr>
               <tr>
                   <td style="border-top:1px solid #236236;height:30px;"> <a style="text-decoration:underline;" href="'.
            url("/admin/user-pending-data/".$d->id ."/". $sdate .""  ).'">'.  $d->nick_name.'</a> </td>
                   <td style="border-top:1px solid #236236;height:30px;">'. $d->email .'</td>						
				   <td style="border-top:1px solid #236236;height:30px;">'. $d->readable_password .'</td>	
					<td style="border-top:1px solid #236236;height:30px;">'. $sub_total .'</td>					   
				   
               </tr> ';
			   
			   
			   $total += $sub_total;
			   
			}   
			$table .='   
				  <tr>
				<td  colspan="4">&nbsp;</td>
				</tr>			   
				<tr>
				<th style="width:10%;"></th>
				<td colspan="2" style="width:80%;">&nbsp;</td>
				<th style="width:10%;">Total:'. $total .'</th>
				</tr> 		   
            </table>';
            echo $table;
        }else{
			echo '<b>No Data Found!</b>';
		}             
    }
	
	public function getDoneReportData(Request $r)
    {  
        $date = trim($r->input("sdate"));        
        $sdate  = date('Y-m-d' , strtotime($date));
		
       	$ids = URLEntryTwo::select(['user_id'])
			->whereDate('urlentry.sdate' , '=' , $sdate)
			->where('urlentry.status' , '=' , 'done')
			->distinct('user_id')
			->get();	
		
		$done_list = collect($ids);	    
		
		$query = URLEntryTwo::select(['user_id'])
			->whereDate('urlentry.sdate' , '=' , $sdate)
			->where('urlentry.status' , '=' , 'done')
			->distinct('user_id'); 		
		
		if($query->count() > 0 )
		{
			$data = User::whereIn('id' , $done_list)->get();
			
			$total = 0;
			
			
           $table = 
            '<table width="100%" border="0" cellpadding="3" cellspacing="3">
               <tr>               
               <th>User</th>
			   <th>Email</th>			    
               <th>Password</th>
			   <th>Done Task</th>';
			   
			foreach($data as $d){ 
				$sub_total  = URLEntryTwo::where('user_id' , '=' , $d->id ) 
					->whereDate('sdate' , '=' , $sdate)
					->where('status' ,'=' , 'done')
					->count();
			$table .='   
               </tr>
               <tr>
                   <td style="border-top:1px solid #236236;height:30px;"> <a style="text-decoration:underline;" href="'.
            url("/admin/user-done-data/".$d->id ."/". $sdate .""  ).'">'.  $d->nick_name.'</a> </td>
                   <td style="border-top:1px solid #236236;height:30px;">'. $d->email .'</td>
                   <td style="border-top:1px solid #236236;height:30px;">'. $d->readable_password .'</td>
				   <td style="border-top:1px solid #236236;height:30px;">'. $sub_total .'</td>
               </tr> ';
			   
			   $total += $sub_total;
			   
			}   
			$table .='   
				 <tr>
				<td  colspan="4">&nbsp;</td>
				</tr>			   
				<tr>
				<th style="width:10%;"> </th>
				<td colspan="2" style="width:80%;">&nbsp;</td>
				<th style="width:10%;">Total: '. $total .'</th>
				</tr>  			   
            </table>';
            echo $table;
		}else{	
			echo '<b>No Data Found!</b>';
        }
    }
	

}
















	

