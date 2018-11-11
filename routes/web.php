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
	Route::resource('admin/post','AdminPostController');
});

Route::get('/home', 'HomeController@index');

Route::get('create',function(){
	App\Post::create(['user_id'=>1,'category_id'=>1,'photo_id'=>1,'title'=>'post two','body'=>'This file is where you may define all of the routes that are handled by your application. Just tell Laravel the URIs it should respond to using a Closure or controller method. Build something great!']);
});

