<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMessages extends Model
{
    protected $table = "user_messages";
	protected $fillable = [ 'id', 
	'user_id', 
	'msg1', 
	'msg2', 
	'created_at', 
	'updated_at' ]; 
}
