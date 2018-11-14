<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
class AdminMediaController extends Controller
{
    public function index(){
    	$photo=Photo::all();
    	return view('admin.media.index',compact('photo'));
    }

    public function store(Request $request){
    	$image=$request->file('file');
    	$filename=time().'_'.$image->getClientOriginalName();
    	$image->move(public_path('postimage/'),$filename);
    	Photo::create([
    		'name'=>$filename,
    	]);
    }

    public function create(){
    	return view('admin.media.upload');
    }

    public function destroy($id){
    	$photo=Photo::whereId($id)->firstorfail()->delete();
    	return redirect()->back();
    }
}
