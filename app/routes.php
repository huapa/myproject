<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/',array('uses' => 'FrontEndController@Index','as' => 'frondend'));
Route::get('/content/{id}',array('uses' => 'FrontEndController@content','as' => 'frondend.content'));
Route::get('/sub-content/{id}',array('uses' => 'FrontEndController@sub_content','as' => 'frondend.sub_content'));
Route::get('details/{id}/{path}',array('uses' => 'FrontEndController@detail','as' => 'content.details'));
//Route::resource('frontend','FrontEndController');
Route::get('login',array('uses' => 'AuthController@Index', 'as' => 'login'));
Route::post('login',array('uses' => 'AuthController@auth', 'as' => 'user'));
Route::get('logout',array('uses'=> 'AuthController@logout','as' => 'logout'));
Route::get('page/process',array('uses' => 'PageController@sub_menu','as' => 'page.process'));

// Route::get('photo',function()
// {
// 	return View::make('home.manage');
// });

// Route::get('photolo',function()
//  {
//  	return 'fdsfds';
//  });
// Route::get('/',function(){
// 	return View::make('home.home');
// });
// Route::controller('gallery','GalleryController');
// Route::controller('dashboard','DashboardController');
Route::group(array('before' => 'auth'), function(){
	Route::resource('register','RegisterController');
	Route::resource('dashboard','DashboardController');
	Route::resource('menu','MenuController');
	Route::resource('sub-menu','SubMenuController');
	Route::resource('category','CategoryController');
	Route::resource('page','PageController');
	Route::resource('comment','CommentController');

});
 


 
