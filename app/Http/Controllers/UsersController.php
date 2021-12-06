<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\verifyuser;
use App\Mail\VerifyEmail;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

// Sessions Chapter
// Validation
//put,get,forget,flush
// put is for saving the data in the session
// get is for viewing the data in the session
// forget is for deleting the key in the session
// flush is for deleting all data in the session

class UsersController extends Controller
{



    public function index(){
        return view('sign-up');
    }
                            // Request is the name of the class
    public function store(Request $request){
      // dd($request->only('email','password'));
        // die and var_dump or print_r request
        //        dd($request-> all()); get all keys for all elements
        //        dd($request-> first_name); get specfic key for an element
      /*  $request->session()->put('info',[
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name
        ]); */
        $validation= $request->validate([
           'first_name'=>['required','regex:/^[a-zA-Z]+$/u'],
            'middle_name'=>['required','regex:/^[a-zA-Z]+$/u'],
            'family_name'=>['required','regex:/^[a-zA-Z]+$/u'],
            'username'=>['required','unique:users,username'],
            'email'=>['required','email','regex:/(.*)@nu.edu.sa/', 'unique:users,email'],
            'password'=>['required','confirmed','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.]).{12,}$/'],
            'Select'=>'required',
            'gender'=>'required',
            'work'=>'required',
        ]);
        $user=User::create([
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'name'=>$request->name,
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'family_name'=>$request->family_name,
            'username'=>$request->username,
            'Select'=>$request->Select,
            'gender'=>$request->gender,
            'work'=>$request->work,

        ]);
        verifyuser::create([
            'token' => Str::random(60),
            'user_id' => $user->id,
        ]);

        Mail::to($user->email)->send(new VerifyEmail($user));
        return \redirect()->route('SignIn')->with('success', 'Please click on the link sent to your email');



        // auth()->attempt($request->only('email','password'));
        //return redirect()->route('Main');



        //validation
        //store user
        //sign in user in
        //redirect
       // dd($request->all());
       // $request->session()->put('info',$request->first_name);
        //return 'done';
    }
    public function verifyEmail($token)
    {
        $verifiedUser = verifyuser::where('token', $token)->first();
        if (isset($verifiedUser)) {
            $user = $verifiedUser->user;
            if (!$user->email_verified_at) {
                $user->email_verified_at = Carbon::now();
                $user->save();

                return \redirect(route('SignIn'))->with('success', 'Your email has been verified');
            } else {
                return \redirect()->back()->with('info', 'Your email has already been verified');
            }
        } else {
            return \redirect(route('SignIn'))->with('error', 'Something went wrong!!');
        }
    }


}
