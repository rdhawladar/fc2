<?php
namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Explanation;
 
use DB; 

class BusinessIdeaController extends Controller
{     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
        $e = Explanation::where('type','=','business_idea')->first();
     
       return view('backend.user.business_idea.business_idea_page')->with('e',$e);
    }    

 
	 
 
    
 
}
