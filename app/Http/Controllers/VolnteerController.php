<?php

namespace App\Http\Controllers;

//use App\Models\User;
use Illuminate\Http\Request;
use Auth;
//use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
//use App\Models\Volnteer;
use App\Mail\ResetPassword;
use session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;




class VolnteerController extends Controller
{
    public function index()
    {
        return view('auth.Login');
    }


    public function createSignin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $user = User::where("email", "=", $request->email)->first();
        if ($user) {

            if (Hash::check($request->password, $user->password)) {
                //if matched then redirect to Main
                $request->session()->put("LoggedUser", $user->id);
                return redirect("home");
            } else {
                return back()->with("fail", "Invalid password");
            }

                return back()->with("fail", "No account found for this email");



        }
    }


    public function signup()
    {
        return view('auth.register');
    }


    public function customSignup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:12',
            'password_confirm' => 'required|min:6|max:12|same:password',
        ]);
        $data = $request->all();
        $check = $this->createUser($data);
        return redirect("home")->withSuccess('Successfully logged-in!');
    }


    public function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'Major' => $data['Major'],
            'Work' => $data['Work'],
            'Gender' => $data['Gender'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'password_confirm' => Hash::make($data['password_confirm'])
        ]);

    }




    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }


    public function forgotPasswordValidate($token)
    {
        $user = User::where('token', $token)->where('is_verified', 0)->first();
        if ($user) {
            $email = $user->email;
            return view('auth.change-password', compact('email'));
        }
        return redirect()->route('forgot-password')->with('failed', 'Password reset link is expired');
    }

    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('failed', 'Failed! email is not registered.');
        }

        $token = Str::random(60);

        $user['token'] = $token;
        $user['is_verified'] = 0;
        $user->save();

        Mail::to($request->email)->send(new ResetPassword($user->name, $token));

        if(Mail::failures() != 0) {
            return back()->with('success', 'Success! password reset link has been sent to your email');
        }
        return back()->with('failed', 'Failed! there is some issue with email provider');
    }

    public function updatePassword(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user['is_verified'] = 0;
            $user['token'] = '';
            $user['password'] = Hash::make($request->password);
            $user->save();
            return redirect()->route('login')->with('success', 'Success! password has been changed');
        }
        return redirect()->route('forgot-password')->with('failed', 'Failed! something went wrong');
    }






    public function logout(Request $request)
    {

if (session()->has("LoggedUser")){
    session()->pull("LoggedUser");
    return redirect('login');
    }
    }
}
