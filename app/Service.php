<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
	* Name of table
	*/
	protected $table = 'service';
	/**
	* @return Relation with move
	*/
	public function Moves()
	{
		return $this->hasMany('App\Move');
	}
}
