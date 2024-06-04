<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        return view('register');
    }

    public function userInfoIndex(){
        $user = Auth::user();
        $verifyEmail = User::where('id', $user->id)->first();
        return view('user_info',compact('user','verifyEmail'));
    }

    public function verifyDocument(){
        return view('deposit');
    }

    public function storeVerificationImage(Request $request){
        $request->validate([
            'front_image'=>['required','image'],
            'back_image'=>['required','image'],
            'id_in_hand'=>['required','image']
        ]);
        
        $user=User::find(auth()->user()->id);
        if(!$user){
            return back()->with('error','User Record Not Found!');
        }
        try{
            $image=DB::transaction(function()use($user,$request){

                $user->addMedia($request->front_image)->toMediaCollection('front_image');
                $user->addMedia($request->back_image)->toMediaCollection('back_image');
                $user->addMedia($request->id_in_hand)->toMediaCollection('id_in_hand');

                return $user;
                
            });
            if($user){
                sweetalert()->addSuccess('Verification Document Submitted Successfully! Please Wait For The Review!');
                return back();
            }
            
        }
        catch(\Exception $e){
            return back()->with('error',$e->getMessage());
            
        }
        
    }

    public function viewVerificationImage(){

        
        
        return view('verify_document');
    }

    
}