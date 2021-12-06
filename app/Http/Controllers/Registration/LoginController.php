<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class LoginController extends Controller
{
    public function index()
    {


        return view('Registration.Login');
    }

    public function store(Request $request)
    {
       /* if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }*/
        $validation= $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->email_verified_at == null) {
                Auth::logout();
                return \redirect(route('Login'))->with('message', 'Please verify your email to continue');

            } elseif (auth()->check() && auth()->user()->hasRole('admin')) {
                return \redirect(url('Admin2 '))->with('success', 'Logged In Successfully');
            }
            // $this->clearLoginAttempts($request);

            return \redirect(route('home'))->with('success', 'Logged In Successfully');
        }


        else{
            //$this->incrementLoginAttempts($request);
            return \redirect()->back()->with('error','Incorrect email or password');
        }
    }
}





