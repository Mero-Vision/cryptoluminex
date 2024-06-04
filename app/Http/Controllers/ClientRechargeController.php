<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRecharge\ClientRechargeCreateRequest;
use App\Models\ClientRecharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientRechargeController extends Controller
{
    public function index(){
        $recharge=ClientRecharge::where('user_id',auth()->user()->id)->latest()->get();
        return view('recharge_verification.recharge_verification',compact('recharge'));
    }

    public function create(){
        return view('recharge_verification.create_recharge_verification');
    }

    public function store(ClientRechargeCreateRequest $request){

        try{
            $recharge=DB::transaction(function()use($request){

                $recharge=ClientRecharge::create([
                    'user_id'=>auth()->user()->id,
                    'name'=>auth()->user()->name??"",
                    'email' => auth()->user()->email ?? "",
                    'phone_no' => auth()->user()->mobile_no ?? "",
                    'amount'=>$request->amount
                    
                ]);
                if($request->verification_image){
                    $recharge->addMedia($request->verification_image)->toMediaCollection('verification_image');
                }
                return $recharge;
                
            });
            if($recharge){
                sweetalert()->addSuccess('Deposit verification submitted successfully!');
                return back();
            }
            
        }
        catch(\Exception $e){
            return back()->with('error',$e->getMessage());
            
        }
        
    }
}