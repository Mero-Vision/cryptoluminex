<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index(){
        return view('change_password');
    }

    public function changepassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);
        $user = User::find(auth()->user()->id);

        if (!$user) {
            return back()->with('error', 'User not found');
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'The current password does not match');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect('/')->with('success', 'Password changed successfully!');
    }
}