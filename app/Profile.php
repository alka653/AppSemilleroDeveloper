<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
	* Name of table
	*/
	protected $table = 'profile';
	/**
	* @return Relation with user
	*/
	public function users()
	{
		return $this->hasMany('App\User');
	}
}
