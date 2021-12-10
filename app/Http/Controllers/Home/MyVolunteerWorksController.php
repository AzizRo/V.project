<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\User;
use App\Models\volunteerwork;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use File;

class MyVolunteerWorksController extends Controller
{
    /* this function will return all Volunteer Works that the Volunteer Provider created
    */
    public function index()
    {
        if (Auth::check()) {
            return view('Home.MyVolunteerWorks', [
                'works' => DB::table('volunteerworks AS t1')
                    ->select('t1.WorkID', 't1.Name', 't1.Description',
                        't1.Skills', 't1.Tasks',
                        't1.Benefits', 't1.Communication', 't1.Volunteernum',
                        't1.StartDate', 't1.EndDate', 't1.Duration', 'volunteer_hours',
                        't1.Gender', 't1.Major', 't1.status', 't1.Location', 't1.Field')
                    ->join('users AS t2', 't2.id', '=', 't1.user_id')
                    ->where("user_id", auth()->id())//->get()

                    ->paginate(6)
            ]);

        } else
        {
            return redirect('welcome');
        }
    }

//Only providers who have approveOpportunity permission can see this page
        public function approveOpportunity()
        {
            if (Auth::check())
            {

                return view('Home.ApproveMyWork', [
                    'works' => DB::table('volunteerworks AS t1')
                        ->select('t1.WorkID', 't1.Name', 't1.Description',
                            't1.Skills', 't1.Tasks',
                            't1.Benefits', 't1.Communication', 't1.Volunteernum',
                            't1.StartDate', 't1.EndDate', 't1.Duration', 'volunteer_hours',
                            't1.Gender', 't1.Major', 't1.status', 't1.Location', 't1.Field')
                        ->join('users AS t2', 't2.id', '=', 't1.user_id')
                        ->where("user_id", auth()->id())//->get()
                        ->Where(['t1.status' => 'Waiting for approval'])
                        ->paginate(6)
                ]);

            }
            else
            {
                return redirect('welcome');
            }

        }

    // This function  will change  the  Status of the work without the  admin clicking  approve button
    public function approval($WorkID)
    {
        if (Auth::check())
        {
            $works = volunteerwork::where('WorkID', '=', ($WorkID))->first();
            if ($works) {
                $works->status = "Approved";
                $works->save();
                return redirect()->back()->with("approval.MyOp","تمت الموافقة على الفرصة التطوعية بنجاح");
            }
            else
            {
                return redirect('welcome');
            }
        }
    }
    // This function  will change  the  Status of the work without the  admin clicking  decline button
    public function decline($WorkID)
    {
        if (Auth::check())
        {
            $works = volunteerwork::where('WorkID', '=', ($WorkID))->first();
            if ($works) {
                $works->status = "Declined";
                $works->save();
                return redirect()->back()->with("decline.MyOp","تم الغاء الفرصة التطوعية بنجاح ");
            }
            else
            {
                return redirect('welcome');
            }

        }
    }

    /* this function will return all Volunteer Works that the Volunteer Provider created with its details
    */
    public function show($WorkID)
    {


        if (Auth::check())
        {
            return view('Home.ShowMyWork', [
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
    //this function will show the volunteers that registered in the opportunity
    public function showVolunteers($WorkID,$Name,$StartDate,$EndDate,$volunteer_hours,$first_name,$middle_name,$family_name)
    {
        if (Auth::check())
        {
            return view('Home.ShowMyVolunteers',[
                'work'=>DB::table('users AS t1')
                    ->select('t1.id','t1.first_name','t1.middle_name' , 't1.family_name',
                        't1.Select', 't1.gender','t1.work','t1.Select','t1.email')
                    ->join('volunteerwork_users AS t2','t1.id','=','t2.volunteer_id')
                    ->where('t2.V_WorkID','=',$WorkID)
                    ->get()
                ,'WorkName'=>[$WorkID,$Name,$StartDate,$EndDate,$volunteer_hours,$first_name.' '.$middle_name.' '.$family_name,]
            ]);
        }
        else
        {
            return redirect("welcome");
        }
    }

    /* this function will create a Certifcate request from the Volunteer provider to the admin */
    public function GiveCertificate($VolunteerName,$VolunteerId,$WorkId,$WorkName,$StartDate,$EndDate,$VolunteeringHours,$ProviderName)
    {
        if (Auth::check())
        {
            $record = DB::table("certificates")->where('VolunteerId', '=', $VolunteerId)
                ->where('WorkId', '=', $WorkId)->exists();
            if ($record==false){
                Certificate::create([
                    'VolunteerName' => $VolunteerName,
                    'VolunteerId' => $VolunteerId,
                    'WorkId' => $WorkId,
                    'WorkName' => $WorkName,
                    'StartDate' => $StartDate,
                    'EndDate' => $EndDate,
                    'VolunteeringHours' => $VolunteeringHours,
                    'ProviderName' => $ProviderName,
                ]);
            }
            else
            {
                return redirect()->back()->with('error','لقد طلبت الشهادة لهذا المتطوع مسبقا');
            }


            return redirect()->back()->with("giveAdmin","تم اصدار الشهادة بنجاح");

        }
        else
        {
            return redirect('welcome');
        }

    }

    /* this function will show the Certifcate to the volunteer or volunteer provider */
    public function showcertificate()
      {

          if (Auth::check())
          {
              return view('Home.certificate',[
                  'MyWorks'=>DB::table("volunteerworks AS t1")
                      ->select( 't1.WorkID','t1.Name', 't1.Description',
                          't1.Skills', 't1.Tasks',
                          't1.Benefits', 't1.Communication',
                          't1.StartDate', 't1.EndDate', 't1.Duration',
                          't1.Gender',  't1.volunteer_hours', 't1.Major', 't1.Location', 't1.Field','t3.Status')
                      ->join('certificates AS t3', 't3.WorkID','=','t1.WorkID')
                      ->where('t3.VolunteerId','=',auth()->user()->id)
                      ->whereColumn('t3.WorkID', 't1.WorkID')
                      ->where('t3.Status','=','تمت الموافقة على الشهادة')
                      ->get()
              ]);
          }
          else
          {
              return redirect('welcome');
          }
    }
    /* this function will return Home.editshow that  Provider can  update his opportunity
        */
    public function editshow($WorkID)
    {
        if (Auth::check())
        {
            return view('Home.editshow',[
                'work' => DB::table('volunteerworks AS t1')
                    ->select('t1.WorkID', 't1.Name', 't1.Description',
                        't1.Name', 't1.Skills', 't1.Tasks',
                        't1.Benefits', 't1.Communication', 't1.Volunteernum',
                        't1.StartDate', 't1.EndDate', 't1.Duration','volunteer_hours',
                        't1.Gender', 't1.Major', 't1.status', 't1.Location', 't1.Field')
                    ->join('users AS t2', 't2.id', '=', 't1.user_id')
                    ->where("t1.WorkID", $WorkID) ->first()
            ]);
        }
        else
        {
            return redirect('welcome');
        }
    }
    /* this function will delete the  Volunteer Work from the Volunteer provider  */
    public function Delete($WorkID)
    {
        if (Auth::check())
        {
            $delete= volunteerwork::find($WorkID);
            $delete->delete();
            return redirect()->back();

        }
        else
        {
            return redirect('welcome');
        }
    }
    /* this function will update the  Volunteer Work from the Volunteer provider  */
    public function update(Request $request)
    {
        if (Auth::check())
        {
            $StartDate=strtotime($request->StartDate);
            $EndDate=strtotime($request->EndDate);
            $Diffrence=(($EndDate-$StartDate)/86400)+1;

            $updating = DB::table("volunteerworks")->where("WorkID",$request->input("WorkID"))
                ->update([
                    'Name'=>$request->Name,
                    'Description'=>$request->Description,
                    'Skills'=>$request->Skills,
                    'Tasks'=>$request->Tasks,
                    'Benefits'=>$request->Benefits,
                    'Communication'=>$request->Communication,
                    'Volunteernum'=>$request->Volunteernum,
                    'StartDate'=>$request->StartDate,
                    'EndDate'=>$request->EndDate,
                    'Duration'=>$Diffrence,
                    'volunteer_hours'=>$request->volunteer_hours,
                    'Gender'=>$request->Gender,
                    'Major'=>json_encode($request->Major),
                    'Location'=>$request->Location,
                    'Field'=>$request->Field

                ]);

            return redirect("MyVolunteerWorks")->with("edit", "تم تحديث الفرصة بنجاح");
        }
        else
        {
            return redirect('welcome');
        }

    }
}
