<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Models\user_volunteerwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    // this function will return Registration.Welcome view
    public function index()
    {
        return view('Registration.Welcome' );

    }
    // this function will let the user logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect("welcome");
    }
}
