<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class PostCommentController extends Controller
{
    public function index(){
    	$comment=Comment::all();
    	return view('admin.post.comment.index',compact('comment'));
    }

    public function post($id){
    	$post=Post::whereId($id)->firstorfail();
    	$comment=$post->comments;
    	return view('post',compact('post','comment'));
    }


    public function store(Request $request){
    	$user=Auth::user();
    	$data=[
    		'post_id'=>$request->get('post_id'),
    		'photo'=>$user->photo ? $user->photo->name : 'http://placehold.it/400×400',
    		'author'=>$user->name,
    		'body'=>$request->get('comment'),
    		'email'=>$user->email,
    	];
    	$comment=Comment::create($data);
    	return redirect()->back();
    }

    public function update(Request $request,$id){
    	$comment=Comment::whereId($id)->firstorfail();
    	$comment->is_active=$request->get('is_active');
    	$comment->update();

    	return redirect()->back();
    }

    public function destroy($id){
    	Comment::find($id)->delete();
    	return redirect()->back();
    }
}
