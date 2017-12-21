<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrlEntryTwo extends Model
{
    protected $table = "urlentry";
	protected $fillable = ['id', 
	'sdate', 
	'user_id', 
	'url', 
	'title_url', 
	'title', 
	'thumbnail', 
	'url_no', 
	'status', 
	'created_at', 
	'updated_at']; 
}
