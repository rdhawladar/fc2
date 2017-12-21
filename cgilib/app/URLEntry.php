<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URLEntry extends Model
{
    protected $table = "url_entry";
	protected $fillable = [
         'id', 
	'user_id', 
	'sdate', 
	'url1', 
	'dl_status1', 
	'url2', 
	'dl_status2', 
	'url3', 
	'dl_status3', 
	'url4', 
	'dl_status4', 
	'url5', 
	'dl_status5', 
	'url6', 
	'dl_status6', 
	'url7', 
	'dl_status7', 
	'url8', 
	'dl_status8', 
	'url9', 
	'dl_status9', 
	'url10', 
	'dl_status10', 
	'created_at', 
	'updated_at'
    ]; 
}
