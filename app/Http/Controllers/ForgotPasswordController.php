<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{

    public function showForgotPasswordForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitForgetPasswordForm(Request $request)
    {
        // check & validate inputted Email
        $request->validate([
            'email' => ['required','email','exists:users','regex:/(.*)@nu.edu.sa/',],
        ]);

        // assign token
        $token = Str::random(64);

        // insert into DB table
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        // Mail::send('email view', [array of data to the view], closure callback to customize recipient, subject etc)
        Mail::send('emails.forgotPassword', ['token' => $token], function($message) use($request){
            $message->from('Najran-Volunteering-Platform@nu.edu.sa', 'Najran Volunteering Platform');
            $message->to($request->email);
            $message->subject('Reset Password');
        });


        return back()
            ->with('info', 'We have emailed your password reset link');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function showResetPasswordForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitResetPasswordForm(Request $request)
    {
        // check & validate input forms
        $request->validate([
            'email' => ['required','email','exists:users','regex:/(.*)@nu.edu.sa/',],
            'password'=>['required','confirmed','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.]).{12,}$/'],
            'password_confirmation' => 'required'
        ]);

        // check DB
        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token,
            ])
            ->first();

        if(!$updatePassword)
        {
            return back()
                ->withInput()
                ->with('error', 'Invalid token!');
        }

        // Update User Model
        $user = User::where('email', $request->email)
            ->update([
                'password' => Hash::make($request->password)
            ]);

        //  Delete
        DB::table('password_resets')->where([
            'email' => $request->email
        ])->delete();

        return redirect(route('SignIn'))->with('success', 'Your Password has been changed');

    }
}
