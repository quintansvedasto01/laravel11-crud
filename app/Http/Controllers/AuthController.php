<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Events\UserSubscribed;

class AuthController extends Controller
{
    public function register(Request $request){
        // validate
        $fields = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:3'],
        ]);

        // register (laravel 11 automatically hashes password)
        $user = User::create($fields);
        
        // login
        Auth::login($user);

        // email verification
        event(new Registered($user));

        // Email if subscribed
        if($request->subscribe){
            event(new UserSubscribed($user));
        }

        // redirect
        return redirect()->route('dashboard');
    }

    public function verifyNotice(){
        return view('auth.verify-email');
    }

    public function verifyEmail(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect()->route('dashboard');
    }

    public function verifyHandler(Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    }

    public function login(Request $request){
        // validate
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        // try to login the user
        if(Auth::attempt($credentials, $request->remember)){
            return redirect()->intended('dashboard');
        } else{
            return back()->withErrors([
                'failed' => 'Invalid credentials'
            ]);
        }
    }

    public function logout(Request $request){
        // logout
        Auth::logout();

        // invaldate user session and regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // redirect
        return redirect()->route('posts.index');
    }
}
