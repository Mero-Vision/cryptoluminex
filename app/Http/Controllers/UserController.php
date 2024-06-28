<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    // public function storeVerificationImage(Request $request){
    //     $request->validate([
    //         'front_image'=>['required','image'],
    //         'back_image'=>['required','image'],
    //         'id_in_hand'=>['required','image']
    //     ]);

    //     $user=User::find(auth()->user()->id);
    //     if(!$user){
    //         return back()->with('error','User Record Not Found!');
    //     }
    //     try{
    //         $image=DB::transaction(function()use($user,$request){
    //             $user->clearMediaCollection('front_image');
    //             $user->clearMediaCollection('back_image');
    //             $user->clearMediaCollection('id_in_hand');
    //             $user->addMedia($request->front_image)->toMediaCollection('front_image');
    //             $user->addMedia($request->back_image)->toMediaCollection('back_image');
    //             $user->addMedia($request->id_in_hand)->toMediaCollection('id_in_hand');

    //             return $user;

    //         });
    //         if($user){
    //             sweetalert()->addSuccess('Verification Document Submitted Successfully! Please Wait For The Review!');
    //             return back();
    //         }

    //     }
    //     catch(\Exception $e){
    //         return back()->with('error',$e->getMessage());

    //     }

    // }

    public function storeVerificationImage(Request $request)
    {
        // Validate the request
        $request->validate([
            'front_image' => ['required', 'image'],
            'back_image' => ['required', 'image'],
            'id_in_hand' => ['required', 'image']
        ]);

        // Find the authenticated user
        $user = User::find(auth()->user()->id);
        if (!$user) {
            return back()->with('error', 'User Record Not Found!');
        }

        try {
            // Use a transaction to ensure atomicity
            DB::beginTransaction();

            // Temporary store images
            $frontImageTempPath = $request->file('front_image')->store('temp');
            $backImageTempPath = $request->file('back_image')->store('temp');
            $idInHandTempPath = $request->file('id_in_hand')->store('temp');

            // Clear existing media collections
            $user->clearMediaCollection('front_image');
            $user->clearMediaCollection('back_image');
            $user->clearMediaCollection('id_in_hand');

            // Add new images to respective collections
            $user->addMedia(storage_path('app/' . $frontImageTempPath))->toMediaCollection('front_image');
            $user->addMedia(storage_path('app/' . $backImageTempPath))->toMediaCollection('back_image');
            $user->addMedia(storage_path('app/' . $idInHandTempPath))->toMediaCollection('id_in_hand');

            // Commit transaction
            DB::commit();

            // Delete temporary images
            Storage::delete([$frontImageTempPath, $backImageTempPath, $idInHandTempPath]);

            // Success response
            sweetalert()->addSuccess('Verification Document Submitted Successfully! Please Wait For The Review!');
            return back();
        } catch (\Exception $e) {
            // Rollback transaction
            DB::rollBack();

            // Delete temporary images in case of error
            Storage::delete([$frontImageTempPath, $backImageTempPath, $idInHandTempPath]);

            // Error response
            return back()->with('error', $e->getMessage());
        }
    }

    public function viewVerificationImage(){

        
        
        return view('verify_document');
    }

    
}