<?php namespace Scholrs;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model 
{

	public function roles()
	{
		return $this->belongsToMany(Role::class);
	}


}

