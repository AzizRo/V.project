<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\volunteerwork;
use App\Models\volunteerwork_user;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyVolunteerOpportunitiesController extends Controller
{
    /* this function will return all the Volunteer Opportunities that the user has register in it */
    public function index()
    {
        if (Auth::check())
        {
        return view('Home.MyVolunteerOpportunities', [
            // whereRaw checks if the two columns values match and return them
            'works' => DB::table("volunteerworks AS t1")
                ->select('t1.WorkID', 't1.Name', 't1.Description',
                    't1.Skills', 't1.Tasks',
                    't1.Benefits', 't1.Communication', 't1.Volunteernum',
                    't1.StartDate', 't1.EndDate', 't1.Duration', 'volunteer_hours',
                    't1.Gender', 't1.Major', 't1.status', 't1.Location', 't1.Field')
                ->join('volunteerwork_users AS t2', 't2.V_WorkID', '=', 't1.WorkID')
                ->where('volunteer_id', '=', auth()->user()->id)
                ->whereRaw('t2.V_WorkID = t1.WorkID')
                ->paginate(6)
        ]);
        }
        else
        {
            return redirect('welcome');
        }
    }
    // this function will show the volunteer opportunity details
    public function show($WorkID)
    {
        if (Auth::check())
        {
            return view('Home.ShowMyOpportunities', [
                'work' => DB::table("volunteerworks AS t1")
                    ->select('t1.WorkID', 't1.Name', 't1.Description',
                        't1.Skills', 't1.Tasks',
                        't1.Benefits', 't1.Communication', 't1.Volunteernum',
                        't1.StartDate', 't1.EndDate', 't1.Duration', 'volunteer_hours',
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
        }
        else
        {
            return redirect('welcome');
        }
    }
    // this function will let the Volunteer Cancel on the Opportunity
    public function Delete($WorkID, $StartDate)
    {
        if (Auth::check())
        {
        $StartDate = strtotime($StartDate);
        $Today = strtotime(Carbon::today()->toDateString());
        $Diffrence = (($StartDate - $Today) / 86400);

        if ($Diffrence > 1)
        {

            volunteerwork_user::where('volunteer_id',auth()->user()->id)->where('V_WorkID',$WorkID)->delete();

            return redirect()->back()->with("cancel"," تم الغاء تسجيلك في الفرصة التطوعية");
        }
        else
        {
            return redirect()->back()->with("declined"," لايمكنك الغاء تسجيلك في الفرصة التطوعية لانه انتهى وقت الالغاء ");
        }

    }
        else
        {
        return redirect('welcome');
        }

    }
}
