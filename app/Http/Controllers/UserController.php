<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function update(User $user, Request $request){
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect(route('users.show',$user));

    }

    public function edit(User $user){
        return view('users.edit',compact('user'));
    }

    public function show(User $user){
        return view('users.show',compact('user'));
    }

    
    public function destroy(User $user){
        $user->delete();
        return redirect(route('posts.index'));
    }
}
