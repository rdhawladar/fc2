<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class ScrapController extends Controller
{      
    public function index()
    {	
		return view("backend.adminv2.scrap_data");
    }  


	public function scrap_data(Request $r)
	{
		
		//https://github.com/FriendsOfPHP/Goutte
		$client = new Client();
		$goutteClient = new Client();
		$guzzleClient = new GuzzleClient(array(
			'timeout' => 1000,
		));
		$goutteClient->setClient($guzzleClient);
		
		$crawler = $goutteClient->request('GET', 'https://movie.eroterest.net/page/693916/');	
		$crawler->filter('h3')->each(function ($node) {
			print $node->text()."</br>";
		});	
		 
		$crawler->filter('.img-responsive')->each(function ($node) {
			print $node->attr('src')."</br>";
		});
				
		//https://viblo.asia/p/laravel-url-preview-like-facebook-with-php-goutte-1VgZvBwmZAw
		//http://www.xvideos.com/video4383488/
	}
	
}
