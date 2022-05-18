<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\RegisterMail;
use App\UserVerification;
use App\User;
use Mail;
use Auth;

class UserAccountController extends Controller
{
    public function emailRegister()
    {
        $data=[];
        $data['name']= 'User Test';
        $data['token']= 'wkwjkfdas8ryeuwqi9873214891jk;lfdkja;ljfd';
        
        return view('mail.register', compact('data'));
    }

    public function verificationUser(Request $request)
    {
        $check_verification = UserVerification::whereToken($request->token)->first();
        
        if ($check_verification) {
            $update_user = User::whereId($check_verification->user_id)->first();
            if ($update_user) {
                $update_user->is_verified = true;
                $update_user->update();
                $check_verification->is_used = true;
                $check_verification->update();
            }
            $request->session()->flash('flash-success', 'User berhasil di verifikasi!');  
            return Redirect('/');
        }else{
            $request->session()->flash('flash-error', 'User gagal di verifikasi!');  
            return Redirect('/');
        }
    }
    
    public function resendVerificationUser(Request $request)
    {
        $user = Auth::user();

        $random = Str::random(50);
        
        $user_verification = new UserVerification;
        $user_verification->email = $user->email;
        $user_verification->user_id = $user->id;
        $user_verification->token = $random;
        $user_verification->save();
        
        $data['name'] = $user->name;
        $data['email'] = $user_verification->email;
        $data['token'] = $user_verification->token;
        
        Mail::to($data['email'])->send(new RegisterMail($data));

        $request->session()->flash('flash-success', 'Email verifikasi sudah di kirim ke '.$user_verification->email.' silahkan check email anda!');  
        return back();
    }
}
