<?php

namespace App\Http\Controllers\Home;
use App\libraries\test;
use App\libraries\Certificate;
//use App\libraries\test;
//use App\libraries\test;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\volunteerwork;
use App\Models\volunteerwork_user;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;


use File;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MyFirstNotification;

class HomeController extends Controller
{
    public function index()
    {


        if (Auth::check())
        {

           if (Auth::user()->work == "faculty member"){
                Auth::user()->assignRole(["volunteer provider" , "volunteer"]);
            }
            elseif (Auth::user()->work == "administrative"){
                Auth::user()->assignRole(["volunteer provider" , "volunteer"]);
            }
            elseif (Auth::user()->work == "student"){
                Auth::user()->assignRole("volunteer");
            }




            return view('Home.Home', [
                'works' => $query = DB::table('volunteerworks AS t1')
                    ->select('t1.WorkID','t1.Name' , 't1.Description',
                        't1.Skills', 't1.Tasks',
                        't1.Benefits', 't1.Communication', 't1.Volunteernum',
                        't1.StartDate', 't1.EndDate', 't1.Duration','t1.volunteer_hours',
                        't1.Gender', 't1.Major', 't1.Location', 't1.Field')
                    ->join('users AS t2','t2.id','=','t1.user_id')
                    -> where(function ($query) {
                        $query->where('t1.Gender', '=', auth()->user()->gender)
                            ->orWhere('t1.Gender', '=', 'Both');
                    })->where(function ($query) {
                        $query->Where('Major', 'LIKE', '%All%')
                            ->orWhere('Major', 'LIKE', '%'.auth()->user()->Select.'%');
                    })->where('Status','=','Approved')
                    ->where('t1.Volunteernum','!=','0')
                    ->where('StartDate','>',Carbon::now()->toDateString())
                    ->orderBy('t1.StartDate', 'asc')
                    ->paginate(9)


            ]);








            }
            else{

                return redirect('/');
            }


        }







    //Role::create(['name' => 'admin']);
        //Permission::create(['name' => 'Create']);
        //$role = Role::findById(1);
        //$permission = Permission::findById(5);
        //$role->givePermissionTo($permission);
       // $permission->removeRole($role);

   // $role = Role::findById(1);

       // $permission1 = Permission::findById(1);
       // $permission2 = Permission::findById(2);
       // $permission3 = Permission::findById(3);
       // $permission4 = Permission::findById(4);
       // $permission5 = Permission::findById(5);


       // $role->givePermissionTo([$permission1, $permission2 ,$permission3,$permission4 , $permission5 ]);
        //$user = User::create(['username' => 'admin']);
        //auth()->user()->givePermissionTo("admin");


        // $user->givePermissionTo('show');
        //return $user->hasPermissionTo('show');

        // dd(auth()->user());


       // $user = Auth::user();
        //$work = Auth::user();


    //$role = Role::findById(1);
    // $permission1 = Permission::findById(1);
    //$permission2 = Permission::findById(2);
    //$permission3 = Permission::findById(3);
    //$permission4 = Permission::findById(4);
    //$permission5 = Permission::findById(5);
//$role->givePermissionTo([$permission1, $permission2 ,$permission3,$permission4 , $permission5 ]);
//auth()->user()->givePermissionTo("admin");
    public function show($WorkID)
    {
        // give this to abdulaziz because you forget the information about the person who created the work
        if (Auth::check()) {
            return view('Home.ShowWork', [
                'work' => DB::table("volunteerworks AS t1")
                    ->select('t1.WorkID', 't1.Name', 't1.Description',
                        't1.Skills', 't1.Tasks',
                        't1.Benefits', 't1.Communication', 't1.Volunteernum',
                        't1.StartDate', 't1.EndDate', 't1.Duration','t1.volunteer_hours',
                        't1.Gender', 't1.Major', 't1.Location', 't1.Field',
                        't2.first_name', 't2.middle_name', 't2.family_name', 't2.email', 't2.Select', 't2.work')
                    ->join('users AS t2', 't2.id', '=', 't1.user_id')
                    ->where("WorkID", $WorkID)
                    ->orWhere(['t2.id' => 't1.user_id'])
                    ->first()
            ]);


        } else {
            return redirect('/');
        }
    }

    public function register(Request $request)
    {

        if (Auth::check()) {
            // Check if the person exist in the database
            //if exist  $record= true
            //if does not exist  $record= false
            $record = DB::table("volunteerwork_users")->where('volunteer_id', '=', auth()->user()->id)
                ->where('V_WorkID', '=', request('WorkID'))->exists();

            $Volunteernum = volunteerwork::find(request('WorkID'))->Volunteernum;
            // dd($Volunteernum);
            if ($Volunteernum == 0 || $record == true) {
                // if record exits it means he already signed in the opportunity
                return redirect(route('home'));
            } else {
                // if record  does not exits it means he is not signed in the opportunity and he can sign in
                volunteerwork_user::create([
                    'volunteer_id' => auth()->id(),
                    'V_WorkID' => request('WorkID')

                ]);
                //Vounteernum -1 than update the record
                $NewNum = volunteerwork::find(request('WorkID'))->Volunteernum - 1;
                volunteerwork::where('WorkID', request('WorkID'))->update(array('Volunteernum' => $NewNum));
                return redirect(route('MyVolunteerOpportunities'))->with('success', 'Registered Successfully');

            }


        }

        else{
            return redirect('/');
        }
    }

    public function sendNotification()
    {
        $user = User::first();

        $details = [
            'greeting' => 'Hi',
            'body' => 'This is my first notification from ItSolutionStuff.com',
            'thanks' => 'Thank you for using ItSolutionStuff.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => 101
        ];

      //  Notification::send($user, new MyFirstNotification($details));
        $user->notify(new MyFirstNotification($details));

       // return ('Hi');


        //dd('done');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }




}

