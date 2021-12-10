<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeFinishedController extends Controller
{
    //this function will return all the Finished Volunteerworks
    public function index()
    {
        // Auth::check -> check if the user is logged in
        if (Auth::check())
        {
            return view('Home.HomeFinished', [
                'works' => $query = DB::table('volunteerworks AS t1')
                    ->select('t1.WorkID','t1.Name' , 't1.Description',
                        't1.Skills', 't1.Tasks',
                        't1.Benefits', 't1.Communication', 't1.Volunteernum',
                        't1.StartDate', 't1.EndDate', 't1.Duration',
                        't1.Gender',  't1.volunteer_hours','t1.Major', 't1.Location', 't1.Field')
                    ->join('users AS t2','t2.id','=','t1.user_id')
                    -> where(function ($query) {
                        $query->where('t1.Gender', '=', auth()->user()->gender)
                            ->orWhere('t1.Gender', '=', 'Both');
                    })->where(function ($query) {
                        $query->Where('Major', 'LIKE', '%All%')
                            ->orWhere('Major', 'LIKE', '%'.auth()->user()->Select.'%');
                    })->where('Status','=','Approved')
                    ->where('t1.Volunteernum','>=',"0")
                    ->where('StartDate','<=',Carbon::now()->toDateString())
                    ->orderBy('t1.StartDate', 'desc')
                    ->paginate(9)
            ]);
        }
        else
        {
            return redirect('welcome');
        }
    }

    //this function will show the details of the work
    public function show($WorkID)
    {
        // give this to abdulaziz because you forget the information about the person who created the work
        if (Auth::check())
        {
            return view('Home.ShowWorkFinished', [
                'work' => DB::table("volunteerworks AS t1")
                    ->select('t1.WorkID', 't1.Name', 't1.Description',
                        't1.Skills', 't1.Tasks',
                        't1.Benefits', 't1.Communication', 't1.Volunteernum',
                        't1.StartDate', 't1.EndDate', 't1.Duration','volunteer_hours',
                        't1.Gender', 't1.Major', 't1.Location', 't1.Field',
                        't2.first_name', 't2.middle_name', 't2.family_name', 't2.email', 't2.Select', 't2.work')
                    ->join('users AS t2', 't2.id', '=', 't1.user_id')
                    ->where("WorkID", $WorkID)
                    ->orWhere(['t2.id' => 't1.user_id'])
                    ->first()
            ]);

        }
        else
        {
            return redirect('welcome');
        }
    }
}
