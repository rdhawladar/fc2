<?php
namespace App\Http\Controllers\User;

 
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth; 

class AuthController extends Controller
{
    
    public function login()
    {	
        //return view('backend.user.auth.login');  
        return view('backend.userv2.login');
    }
    
    public function loginAction(Request $r)
	{
		$validator = \Validator::make($r->all(), [	        
	        'email' => 'required|email|max:255',	        
	        'password' => 'required'
	    ]);    

		if ($validator->fails()) 
		{
            return redirect()->action('User\AuthController@login')
                        ->withErrors($validator)
                        ->withInput();
        }
		
	    if (Auth::attempt(['email' => $r->email, 'password' => $r->password], $r->remember)) 
		{
            Auth::user()->type = 'user';
            return redirect('/user/home');
        }else{
        	return redirect()->back()->withInput()->with('error_message', 'Wrong email address or password! Please try again');
        }
	}
	
	public function logout()
	{
		Auth::logout();
		return redirect('/user/login');	
	}
	
}	