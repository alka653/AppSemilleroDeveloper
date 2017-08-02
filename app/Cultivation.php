<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultivation extends Model
{
    /**
	*Name of table
	*/
	protected $table = 'cultivation';
	/**
	* @return Relation with user
	*/
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	/**
	* @return Relation with product
	*/
	public function product()
	{
		return $this->belongsTo('App\Product');
	}
}
