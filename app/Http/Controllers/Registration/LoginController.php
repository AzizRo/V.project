<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\ThrottlesLogins;



class LoginController extends Controller
{
    use ThrottlesLogins;
    /**
     * The maximum number of attempts to allow.
     *
     * @return int
     */
    protected $maxAttempts = 5;


    /**
     * The number of minutes to throttle for.
     *
     * @return int
     */
    protected $decayMinutes = 5;

    // this function will return Registration.Login view
    public function index()
    {
        return view('Registration.Login');
    }

    public function username()
    {
        return 'email';
    }

    // this function is for the sign in process
    public function store(Request $request)
    {
        if ($this->hasTooManyLoginAttempts($request))
        {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        $validation= $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            if (Auth::user()->email_verified_at == null)
            {
                Auth::logout();
                return \redirect(route('Login'))->with('message', 'يرجى التحقق من بريدك الإلكتروني للمتابعة');

            } elseif (auth()->check() && auth()->user()->hasRole('admin'))
            {
                return \redirect(url('Admin2 '))->with('success', 'تم تسجيل الدخول بنجاح');
            }
            $this->clearLoginAttempts($request);
            return \redirect(route('home'))->with('success', 'تم تسجيل الدخول بنجاح');
        }
        else
        {
            $this->incrementLoginAttempts($request);
            return \redirect()->back()->with('error','البريد الالكتروني أو كلمة المرور غير صحيحة');
        }
    }
}





