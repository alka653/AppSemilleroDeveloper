<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
	* Name of table
	*/
	protected $table = 'product';
	/**
	* @return Relation with cutivation
	*/
	public function cultivations()
	{
		return $this->hasMany('App\Cultivation');
	}
}
