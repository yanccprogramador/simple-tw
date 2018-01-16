<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Auth;

class UserController extends Controller
{
    //
    public function upload(Request $request)
    {

        // Handle the user upload of icon
        if($request->hasFile('icon')){
            $icon = $request->file('icon');
            $filename = time() . '.' . $icon->getClientOriginalExtension();
            Image::make($icon)->resize(40, 40)->save( public_path('/uploads/icons/' . $filename ) );

            $user = Auth::user();
            $user->icon = $filename;
            $user->save();
        }

        return redirect('home');

    }

    public function viewUpload()
    {
        return view('auth/icon');
    }
}
