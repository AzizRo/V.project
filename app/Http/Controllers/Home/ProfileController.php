<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\volunteerwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // this function will return Home.Profile view
    public function index()
    {
        if (Auth::check())
        {
        return view('Home.Profile');
        }
        else
        {
            return redirect('welcome');
        }

    }
    /* this function will update the phone number field if the users want to add a phone number */
    public function update(Request $request)
    {
        if (Auth::check()) {

            $validation= $request->validate([
                'phone_no'=>'required',
            ]);
            $updating = DB::table("users")->where("id",$request->input("cid"))
                ->update([

                    'phone_no'=>$request->phone_no,
                ]);

            return redirect()->back()->with("updateU","تم تحديث الحساب بنجاح");
        }
        else
        {
            return redirect('welcome');
        }

    }
}
