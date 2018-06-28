<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\User;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use Storage;

class UserController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->where('roles_id','!=','1')->get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->position = $request->position;
        $user->roles_id = 2;
        $user->password = $request->password;
        if($request->image != null){
            $user->image = App::make('ImageResize')->imageStore($request->image, 'users', 360, 448);
            $user->image = App::make('ImageResize')->imageStore($request->image, 'users-thumb', 117, 117);
            $user->image = App::make('ImageResize')->imageStore($request->image, 'users-tiny', 80, 80);
        }
        if($user->save()){
        return redirect()->route('users.index')->with([
            "status"=> "Success",
            "message"=> "You have successfully added a new Team member",
            "color"=> "success"
            ]);
        }   
        else{
            return redirect()->route('users.index')->with([
                "status"=> "Failure",
                "message"=> "Unfortunately the new User did not save correctly",
                "color"=> "danger"
                ]);
            };
        }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request,User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->position = $request->position;
        if($request->image != null){
            if(Storage::disk('users')->exists($user->image)){
                App::make('ImageDelete')->imageDelete($user->image, 'users');
                App::make('ImageDelete')->imageDelete($user->image, 'users-thumb');
                App::make('ImageDelete')->imageDelete($user->image, 'users-tiny');
            }
            $user->image = App::make('ImageResize')->imageStore($request->image, 'users', 360, 448);
            $user->image = App::make('ImageResize')->imageStore($request->image, 'users-thumb', 117, 117);
            $user->image = App::make('ImageResize')->imageStore($request->image, 'users-tiny', 80, 80);
        }
        if($user->save()){
        return redirect()->route('users.index')->with([
            "status"=> "Success",
            "message"=> "You have successfully modified ".$user->name."s details",
            "color"=> "success"
            ]);
        }   
        else{
            return redirect()->route('users.index')->with([
                "status"=> "Failure",
                "message"=> "Unfortunately ".$user->name."s details didn't modify",
                "color"=> "danger"
                ]);
            };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Storage::disk('users')->exists($user->image)){
            App::make('ImageDelete')->imageDelete($user->image, 'users');
            App::make('ImageDelete')->imageDelete($user->image, 'users-thumb');
            App::make('ImageDelete')->imageDelete($user->image, 'users-tiny');
        }
        if($user->delete()){
            return redirect()->route('users.index')->with([
                "status"=> "Sorry to see them go!",
                "message"=> "You have successfully removed the user",
                "color"=> "success"
            ]);
        }else{
            return redirect()->route('users.index')->with([
                "status"=> "Failure",
                "message"=> "Unfortunately the user was not archived",
                "color"=> "danger"
            ]);
        }
    }

}
