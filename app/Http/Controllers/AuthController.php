<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {

        $credential = $request->only('email', 'password');
        try {
            if (Auth::attempt($credential)) {
                $user = Auth::user();
                if ($user->status == 'client') {

                    if ($user->is_frozen == 'inactive') {
                        sweetalert()->addSuccess('Welcome ' . $user->name);
                        return redirect('/');
                    } else {
                        sweetalert()->addWarning('Your account is freeze. Contact admin to unfreeze your account!');

                        return back();
                    }
                } else {
                    sweetalert()->addWarning('Your account does not have the necessary permissions associated with client access. If you believe this is in error, please contact our support team for assistance.');

                    return back();
                }
            } else {
                sweetalert()->addWarning('Invalid email or password. Please ensure 
                that you have entered the correct credentials.');

                return back();
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        if ($user) {
            auth()->logout();

            sweetalert()->addSuccess('Logout Successfully!');
            return redirect('/');
        } else {
            sweetalert()->addWarning('User is not authenticated!');
            return redirect('/');
        }
    }
}