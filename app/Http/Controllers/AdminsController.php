<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminsController extends Controller
{
    public function AdminProfile()
    {
       // $id = Auth::admin()->id;
        $admin = Admin::find(1);
        return view('admin.profile.view_profile', compact('admin'));
    }


    public function AdminProfileEdit()
    {
       // $id = Auth::user()->id;
        $editAdminProfile = Admin::find(1);
        return view('admin.profile.view_profile_edit', compact('editAdminProfile'));
    }

    public function AdminProfileSave(Request $request)
    {
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path'))
        {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile updated successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function AdminPassView()
    {
        return view('admin.pass.pass_edit');
    }


    public function AdminPassUpdate(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPass = Admin::find(1)->password;
        if(Hash::check($request->oldpassword,$hashedPass))
        {
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }
        else{
            return redirect()->back();
        }
    }

}
