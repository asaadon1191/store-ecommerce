<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\AdminPasswordRequest;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $admin = \auth('admin')->user();
        // return $admin;
        return \view('admin.settings.profile.edit',compact('admin'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        try 
        {
            $admin = Admin::find(auth()->user()->id);
            // return $request;

            if ($request->filled('password')) 
            {
                $request->merge(['password' => \bcrypt($request->password)]);
            }
            // return $request;
            
            unset($request['id']);
            unset($request['password_confirmation']);
            $update = $admin->update($request->all());
            
            return \redirect()->back()->with(['success' => 'تم التعديل بنجاح']);

        } catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->back()->with(['error' => 'هناك خطا ما برجاء المحاولة فيما بعد']);
        }
    }

    
}
