<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Explanation;
 
use DB; 

class IthopiaRequestController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
        $e = Explanation::where('type','=','ithopia_request')->first();
     
       return view('backend.user.ithopia_request.ithopia_request_form')->with('e',$e);
    }    

 
	 
 
    
 
}
