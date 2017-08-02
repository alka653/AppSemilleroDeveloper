<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerIncome extends Controller
{
	/**
	*@return view from cultivation
	*/
    public function cultivation()
    {
    	return view('cultivation');
    }
    /**
	*@return view from cultivation
	*/
    public function currentCultivation()
    {
    	return view('current_cultivation');
    }
}
