<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\Facades\DB;
use Illuminate\support\Facades\Redirect;
use Hash;
use validator;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.signinC');
    }


    public function createSignin(Request $request )
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        //get details
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        //if user exist in database, so it will redirect on dashboard otherwise back to login page and show wrong login details.
        if (Auth::attempt($user_data)) {
            return redirect('interface');
        } else {
            return back()->with('error', 'Wrong login details');
        }

    }


    public function signup()
    {
        return view('auth.signupC');
    }


    public function customSignup(Request $request)
    {
        $this->validate($request,[
            'name' => "required",
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
        $values = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'remember_token' => $request->input('token')

        );

        //insert user details in users table
        DB::table('users')->insert($values);

        //back with success message
        return Redirect::to("interface")->with('msg','You have successfully registered.');
    }




    function interface()
    {

        return view('interface');
    }



    /*public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login2');
    }*/
}
