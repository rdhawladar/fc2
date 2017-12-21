<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MajimeTerroristRequest extends Model
{
    protected $table = "majime_terrorist_request";
	protected $fillable = [ 'id' ,'name' ,'profession' ,'created_at' , 'updated_at' ]; 
}
