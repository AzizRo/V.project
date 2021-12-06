<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Models\user_volunteerwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {

        //$volunteers= DB::table("user_volunteerworks")->count();

        return view('Registration.Welcome' );

    }




    public function logout(Request $request) {
        Auth::logout();
        return redirect("/");
    }
}
