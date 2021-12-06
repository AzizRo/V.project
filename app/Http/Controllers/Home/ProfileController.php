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
    public function index()
    {


        return view('Home.Profile');
    }



    public function update(Request $request)
    {
        $validation= $request->validate([
            'phone_no'=>'required',
        ]);
        $updating = DB::table("users")->where("id",$request->input("cid"))
            ->update([

            'phone_no'=>$request->phone_no,
           // 'work'=>$request->work,

        ]);

        return redirect()->back()->with("success","Update Successfully");

    }
}
