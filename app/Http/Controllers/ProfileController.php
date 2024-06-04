<?php

namespace App\Http\Controllers;

use App\Models\ClientBalance;
use App\Models\CoinURL;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $verifyEmail=User::where('id',$user->id)->first();
        $uuid = Str::uuid()->toString();
        
        return view('profile',compact('verifyEmail', 'uuid'));
    }
}