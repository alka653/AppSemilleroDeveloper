<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Service;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $service = Service::all();
        return view('home',['products'=>$product,'services'=>$service]);
    }

}
