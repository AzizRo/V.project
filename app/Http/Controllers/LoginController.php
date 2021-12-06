<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Controllers;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\VerifyUser;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class LoginController extends Controller
{

    public function index()
    {
        return view('sign-in');
    }

    public function store(Request $request)
    {
        $validation= $request->validate([
            'email'=>'required|email|exists:users',
            'password'=>'required'

        ]);
      /*
       if (!auth()->attempt($request->only('email','password')))
       {
        return back()->with('status','Invalid login details');
       }

        return redirect()->route('Main');
      */

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->email_verified_at == null) {
                Auth::logout();
                return \redirect(route('SignIn'))->with('message', 'Please verify your email to continue');
            }elseif (Auth::user()->is_admin == 1){
                return \redirect(route('admin'))->with('success', 'Logged In Successfully');
            }
            return \redirect(route('Main'))->with('success', 'Logged In Successfully');
        }
        else{
                return \redirect()->back()->with('error','Incorrect email or password');
            }

    }

}
