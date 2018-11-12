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
}
