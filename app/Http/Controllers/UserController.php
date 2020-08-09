<?php

namespace App\Http\Controllers;

use app\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function mypage()
    {

        $user = Auth::user();
        return view('users.mypage', [
            'user' => $user,
        ]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('users.edit',[
            'user' => $user
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
        
        $filename = $request->file('profile_image')->store('public');
        

        $auth_id = Auth::id();
        $user = User::where('id', $auth_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'intro' => $request->intro,
            'profile_image' => $request->profile_image = str_replace('public', '', $filename)
        ]);
        // $request->profile_image = str_replace('public', '', $filename);

        

        // $user->name = $request->name;
        // $user->intro = $request->intro;
        // $user->email = $request->email;
        // $user->save();

        return redirect()->route('users.mypage');

    }
}
