<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    /**
	* Name of table
	*/
	protected $table = 'move';
	/**
	* @return Relation with cultivation
	*/
	public function cultivation()
	{
		return $this->belongsTo('App\Cultivation');
	}
	/**
	* @return Relation with service
	*/
	public function service()
	{
		return $this->belongsTo('App\Service');
	}
}
