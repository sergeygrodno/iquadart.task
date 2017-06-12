<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spare extends Model
{
    protected $fillable = ['name'];
	
	public function group()
	{
		return $this->belongsTo(Group::class);
	}
	
	public function manufacturer()
	{
		return $this->belongsTo(Manufacturer::class);
	}
}
