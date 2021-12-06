<?php

namespace App\Http\Controllers;

//use App\Models\myform;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.signinC');
    }


    public function createSignin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $data = User::where("email", "=", $request->email)->first();
        if ($data) {
            if (Hash::check($request->password, $data->password)) {
                //if matched then redirect to Main
                $request->Session()->put("LoggedEmployee", $data->id);
                return redirect("interface");
            } else {
                return back()->with("fail", "Invalid password");
            }
        } else {
            return back()->with("fail", "No account found for this email");
        }
    }


    public function signup()
    {
        return view('auth.signupC');
    }



    public function customSignup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:12',
        ]);
        $data = $request->all();
        $check = $this->createUser($data);
        return redirect("interface")->withSuccess('Successfully logged-in!');
    }


    public function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),



        ]);

    }


    function interface()
    {

        return view('interface');
    }



    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login2');
    }


}

