<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CommentReply;

class PostCommentReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
    public function index(){
        $reply=CommentReply::all();
        return view('admin.post.comment.reply.index',compact('reply'));
    }
    /**

     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reply=CommentReply::whereId($id)->firstorfail();
        $reply->is_active=$request->get('is_active');
        $reply->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CommentReply::whereId($id)->firstorfail()->delete();
        return redirect()->back();
    }

    public function createReply(Request $request){
        $user=Auth::user();
        $data=[
            'comment_id'=>$request->get('comment_id'),
            'email'=>$user->email,
            'photo'=>$user->photo? $user->photo->name :'http://placehold.it/400×400',
            'author'=>$user->name,
            'body'=>$request->get('reply'),
        ];

        CommentReply::create($data);
        return redirect()->back();
    }
}
