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
    // this function will return Registration.Register view
    public function index()
    {
        return view('Registration.Register');
    }
    //this function will store the registerd user in the database
    public function store(Request $request)
    {

        $validation= $request->validate([
            'الاسم_الاول'=>'required',
            'اسم_الاب'=>'required',
            'اسم_العائلة'=>'required',
            'اسم_المستخدم'=>['required','unique:users,username'],
            'الايميل'=>['required','email','regex:/(.*)@nu.edu.sa/', 'unique:users,email'],
            'كلمة_المرور'=>['required','confirmed','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.]).{8,}$/'],
            'التخصص'=>'required',
            'الجنس'=>'required',
            'العمل'=>'required',

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
        return \redirect()->route('Login' )->with('success', 'الرجاء الضغط على الرابط المرسل إلى بريدك الإلكتروني');
    }
    // this function is for verifying email
    public function verifyEmail($token)
    {
        $verifiedUser = verifyuser::where('token', $token)->first();
        if (isset($verifiedUser))
        {
            $user = $verifiedUser->user;
            if (!$user->email_verified_at)
            {
                $user->email_verified_at = Carbon::now();
                $user->save();

                return \redirect(route('Login' ))->with('success', 'تم التحقق من بريدك الالكتروني');
            }
            else
            {
                return \redirect()->back()->with('info', 'تم التحقق من بريدك الإلكتروني بالفعل');
            }
        }
        else
        {
            return \redirect(route('Login' ))->with('error', 'هناك خطأ ما!!');
        }
    }


}
