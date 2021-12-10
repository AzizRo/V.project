<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    // this function is for the logout button
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/Login');
    }
}
