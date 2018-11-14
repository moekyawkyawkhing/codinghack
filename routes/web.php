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
	Route::resource('admin/category','AdminCategoryController');
	Route::resource('admin/media','AdminMediaController');
	Route::resource('admin/comment','PostCommentController');
	Route::resource('admin/commentreply','PostCommentReplyController');
	// Route::get('admin/media',['as'=>'admin.media','uses'=>'AdminMediaController@index']);
});
Route::delete('delete/media','AdminMediaController@deleteMedia');
Route::get('post/{id}',['as'=>'home.post','uses'=>'PostCommentController@post']);
Route::post('reply',['as'=>'comment.reply','uses'=>'PostCommentReplyController@createReply']);
Route::get('/home', 'HomeController@index');

