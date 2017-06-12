<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function spares()
	{
		return $this->hasMany(Spare::class);
	}
}
