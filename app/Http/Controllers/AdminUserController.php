<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Photo;
use App\User;
use App\Http\Requests\AdminUser;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user=User::all();
        return view('admin.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $role=Role::pluck('name','id')->all();
        // var_dump($role);
        return view('admin.user.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUser $request)
    {   
        if(trim($request->get('password'))==''){
            $password=$request->except('password');
        }else{
            $password=bcrypt($request->get('password'));
        }

        if($request->file('photo')){
            $file=$request->file('photo');
            $filename=time()."_".$file->getClientOriginalName();
            $file->move(public_path('image/'),$filename);
            $photo=Photo::create(['name'=>$filename]);
            $photo_id=$photo->id;
        }else{
            $photo_id=null;
        }

        User::create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>$password,
            'is_active'=>$request->get('active'),
            'photo_id'=>$photo_id,
            'role_id'=>$request->get('role')
        ]);

        return redirect(action('AdminUserController@create'));
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
        $user=User::find($id);
        $role=Role::pluck('name','id')->all();
        return view('admin.user.edit',compact('user','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUser $request, $id)
    {
        if($request->get('password')==''){
            $password=$request->except('password');
        }else{
            $password=bcrypt($request->get('password'));
        }

         if($request->file('photo')){
            $file=$request->file('photo');
            $filename=time()."_".$file->getClientOriginalName();
            $file->move(public_path('image/'),$filename);
            $photo=Photo::create(['name'=>$filename]);
            $photo_id=$photo->id;
        }else{
            $photo_id=null;
        }

        $user=User::find($id);
            $user->name=$request->get('name');
            $user->email=$request->get('email');
            $user->password=$password;
            $user->is_active=$request->get('is_active');
            $user->photo_id=$photo_id;
            $user->role_id=$request->get('role_id');
       if( $user->update()){
        session()->flash('update_user','Edit user successful');
       }

        return redirect(action('AdminUserController@edit',$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $photo=Photo::find($user->photo_id);
        if($user->photo){
            unlink(public_path('image/'.$user->photo->name));
            $photo->delete();
        }
        if($user->delete()){
            session()->flash('delete_user','Delete user successful');
        }
        return redirect(action('AdminUserController@index'));
    }
}
