<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show($name)
    {
        $user = User::where('name', $name)->first();

        return view('users.show', [
            'user' => $user
        ]);
    }

    public function edit($name)
    {
        $user = User::where('name', $name)->first();
        return view('users.edit',[
            'user' => $user
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
        
        // $filename = $request->file('profile_image')->store('public');

        $image = $request->file('profile_image');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->put('myprefix', $image, 'public');
        // アップロードした画像のフルパスを取得
        // $user->profile_image = Storage::disk('s3')->url($path);

        $auth_id = Auth::id();
        $user = User::where('id', $auth_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'intro' => $request->intro,
            'profile_image' => $request->profile_image = Storage::disk('s3')->url($path),
        ]);
        // $request->profile_image = str_replace('public', '', $filename);

        

        // $user->name = $request->name;
        // $user->intro = $request->intro;
        // $user->email = $request->email;
        // $user->save();

        return redirect()->route('users.show');

    }
}
