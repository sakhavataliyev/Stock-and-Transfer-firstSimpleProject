<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function UserLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }


    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.profile.view_profile', compact('user'));
    }

    public function UserProfileEdit()
    {
        $id = Auth::user()->id;
        $editUserProfile = User::find($id);
        return view('user.profile.view_profile_edit', compact('editUserProfile'));
    }

    public function UserProfileSave(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path'))
        {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile updated successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('user.profile')->with($notification);
    }

    public function UserPassView()
    {
        return view('user.pass.pass_edit');
    }


    public function UserPassUpdate(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPass = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPass))
        {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }
        else{
            return redirect()->back();
        }
    }


}
