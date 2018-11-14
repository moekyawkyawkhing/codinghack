<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Photo;
use App\Category;
use App\Http\Requests\FormPostRequest;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Post::paginate(2);        
        return view('admin.post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat=Category::pluck('name','id')->all();    
        return view('admin.post.create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormPostRequest $request)
    { 
        $user=Auth::user();
        if($file=$request->file('photo')){
            $file_name=time()."_".$file->getClientOriginalName();
            $file->move(public_path('postimage/'),$file_name);
            $photo=Photo::create(['name'=>$file_name]);
            $input['photo_id']=$photo->id;
        }else{
            $input['photo_id']=null;
        }

        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$request->get('category_id'),
            'title'=>$request->get('title'),
            'body'=>$request->get('body')
        ]);

        return redirect(action('AdminPostController@create'));
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
    {   $cat=Category::pluck('name','id');
        $post=Post::find($id);
        return view('admin.post.edit',compact('post','cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormPostRequest $request, $id)
    {   
        $input=$request->all();
        $user=Auth::user();
        if($file=$request->file('photo')){
            $file_name=time()."_".$file->getClientOriginalName();
            $file->move(public_path('postimage/'),$file_name);
            $photo=Photo::create(['name'=>$file_name]);
            $input['photo_id']=$photo->id;
        }else{
            $input['photo_id']=null;
        }
        $user->posts()->whereId($id)->first()->update($input);

        return redirect(action('AdminPostController@edit',$id));
    }

    /**s
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        if($post->photo->name){
            unlink(public_path('postimage/'.$post->photo->name));
        }
        $photo=Photo::find($post->photo->id);
        $photo->delete();
        $post->delete();
        session()->flash('delete_post','delete post successful');
        return redirect(action('AdminPostController@index'));
    }
}
