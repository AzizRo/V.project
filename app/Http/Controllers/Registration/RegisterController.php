<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\verifyuser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RegisterController extends Controller
{
    public function index(){
        return view('Registration.Register');
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
            'first_name'=>'required',
            'middle_name'=>'required',
            'family_name'=>'required',
            'username'=>['required','unique:users,username'],
            'email'=>['required','email','regex:/(.*)@nu.edu.sa/', 'unique:users,email'],
            'password'=>['required','confirmed','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.]).{8,}$/'],
            'Select'=>'required',
            'gender'=>'required',
            'work'=>'required',

        ]);
        $user= new User;
        $user-> email= $request->email;
        $user-> password= Hash::make($request->password);
        $user-> first_name= $request->first_name;
        $user-> middle_name= $request->middle_name;
        $user-> family_name= $request->family_name;
        $user-> username= $request->username;
        $user-> Select= $request->Select;
        $user-> gender= $request->gender;
        $user-> work= $request->work;
        $user->save();


        $user->roles()->attach( Role::where("name","auth")->first());

        verifyuser::create([
            'token' => Str::random(60),
            'user_id' => $user->id,
        ]);

        Mail::to($user->email)->send(new VerifyEmail($user));
        return \redirect()->route('Login' )->with('success', 'Please click on the link sent to your email');




    }
    public function verifyEmail($token)
    {
        $verifiedUser = verifyuser::where('token', $token)->first();
        if (isset($verifiedUser)) {
            $user = $verifiedUser->user;
            if (!$user->email_verified_at) {
                $user->email_verified_at = Carbon::now();
                $user->save();


                return \redirect(route('Login' ))->with('success', 'Your email has been verified');
            } else {
                return \redirect()->back()->with('info', 'Your email has already been verified');
            }
        } else {
            return \redirect(route('Login' ))->with('error', 'Something went wrong!!');
        }
    }


}
