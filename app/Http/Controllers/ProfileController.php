<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {

        return view('UserView.profile', [
            'user' => auth()->user()
        ]);
    }
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id_user);
        $user->update($request->except('image'));
        if($request->hasFile('image')){
            $image = $request->file('image')->store('public/users');
            Storage::delete($user->image);
            $user->image = $image;
        }
        $user->save();
        return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
    }
}
