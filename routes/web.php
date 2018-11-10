<?php
use App\Role;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
	// $user=Auth::user();
 //    echo $user->isAdmin();
    return view('home');
});

Auth::routes();

Route::group(['middleware'=>['isadmin']],function(){
	Route::resource('admin/user','AdminUserController');
});

Route::get('/home', 'HomeController@index');

