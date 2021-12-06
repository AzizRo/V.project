<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyWorkRegisteredController extends Controller
{
    public function show($WorkID)
    {


        if (Auth::check()) {
            return view('Home.MyWorkRegistered', [
                'work' => DB::table("volunteerworks AS t1")
                    ->select('t1.WorkID', 't1.Name', 't1.Description',
                        't1.Skills', 't1.Tasks',
                        't1.Benefits', 't1.Communication', 't1.Volunteernum',
                        't1.StartDate', 't1.EndDate', 't1.Duration','volunteer_hours',
                        't1.Gender', 't1.Major', 't1.Location', 't1.Field',
                        't2.first_name', 't2.middle_name', 't2.family_name', 't2.email', 't2.Select', 't2.work')
                    ->join('users AS t2', 't2.id', '=', 't1.user_id')
                    ->join('volunteerwork_users AS t3', 't3.V_WorkID', '=', 't1.WorkID')
                    ->where("WorkID", $WorkID)
                    ->orWhere(['t2.id' => 't1.user_id'])
                    ->orWhere(['t2.id' => 't3.volunteer_id'])
                    ->whereRaw('t3.V_WorkID = t1.WorkID')
                    ->first()
            ]);


        } else {
            return redirect('/');
        }

    }
}
