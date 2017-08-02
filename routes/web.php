<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix'=>'admin'],function(){
	Route::get('index',[
	'uses'=>'controlador@index',
	'as'=>'index']);
});
Route::group(['middleware'=>'admin'],function(){
});
Route::get('/','ControllerStart@index')->name('index');
Route::post('/service','ControllerStart@createService')->name('create_service');
Route::post('/cultivation/{idUser}','ControllerStart@createCultivation')->name('create_cultivation');
Route::post('/product','ControllerStart@createProduct')->name('create_product');
Route::post('/cost/{idCultivation}','ControllerCosts@createCost')->name('create_cost');
Route::post('/expense/{idCultivation}','Controllerexpenses@createExpense')->name('create_expense');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
