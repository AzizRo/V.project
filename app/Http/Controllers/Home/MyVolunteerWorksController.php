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
    public function index()
    {
        /*$data=array(
            "works" =>DB::table("volunteerworks")->where("user_id",auth()->id())->get());
        return view('Home.MyVolunteerWorks' , $data);*/

        return view('Home.MyVolunteerWorks', [
            'works' => DB::table('volunteerworks AS t1')
                ->select('t1.WorkID','t1.Name' , 't1.Description',
                    't1.Skills', 't1.Tasks',
                    't1.Benefits', 't1.Communication', 't1.Volunteernum',
                    't1.StartDate', 't1.EndDate', 't1.Duration','volunteer_hours',
                    't1.Gender', 't1.Major','t1.status', 't1.Location', 't1.Field')
                ->join('users AS t2', 't2.id', '=', 't1.user_id')
                ->where("user_id",auth()->id())//->get()

                // ->whereIn('t1.Major', ['CS'])
                //->where('t1.Gender' ,'=', 'Both')
                // -> orWhere('t1.Gender', '=', 'Female')
                ->paginate(6)


        ]);


        // return view('Home.MyVolunteerWorks');
    }

    public function show($WorkID)
    {


        if (Auth::check()) {
            return view('Home.ShowMyWork', [
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
            return redirect(route('Welcome'));
        }
    }

    public function GiveCertificate($VolunteerName,$VolunteerId,$WorkId,$WorkName,$StartDate,$EndDate,$VolunteeringHours,$ProviderName)
    {

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

        return redirect()->back();

    }

      public function showcertificate()
      {
          $Test= "تمت الموافقة";
          $Test2= "طلب شهادة من صاحب العمل ";

          return view('Home.certificate',[

              // whereRaw checks if the two columns values match and return them
              'MyWorks'=>DB::table("volunteerworks AS t1")
                  ->select( 't1.WorkID','t1.Name', 't1.Description',
                      't1.Skills', 't1.Tasks',
                      't1.Benefits', 't1.Communication',
                      't1.StartDate', 't1.EndDate', 't1.Duration','t1.volunteer_hours',
                      't1.Gender', 't1.Major', 't1.Location', 't1.Field')
                  ->join('volunteerwork_users AS t2', 't2.V_WorkID', '=', 't1.WorkID')
                  ->where('volunteer_id','=',auth()->user()->id)
                  ->whereRaw('t2.V_WorkID = t1.WorkID')
                  ->get()


          ]);


    }






    public function editshow($WorkID)
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
    public function Delete($WorkID)
    {

    $delete= volunteerwork::find($WorkID);
            $delete->delete();
         return redirect()->back();

    }

    public function update(Request $request)
    {
        /*$validation= $request->validate([
            'Name' => 'required',//['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/']
            'Description' => 'required',
            'Skills' => 'required',
            'Tasks' => 'required',
            'Benefits' => 'required',
            'Communication' => 'required',
            'Volunteernum' => 'required',
            'StartDate' => 'required',
            'EndDate' => 'required',
            'Gender' => 'required',
            'Major' => 'required',
            'Location' => 'required',
            'Field' => 'required',
        ]);*/

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

        return redirect("MyVolunteerWorks")->with("success","Update Successfully");

    }

    /*
                 //<a  class="delete"  data-confirm="Are you sure to delete this item?" href="MyVolunteerWorks/delete/{{{$work->WorkID}}}">Delete</a>


                  <button  class="delete" onclick="document.getElementById('id01').style.display='block'" >Delete</button>

                  //model
                  <div id="id01" class="modal">
                      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                      <form class="modal-content" action="{{url("MyVolunteerWorks/delete/{WorkID}")}}" method="post">
                          @method("delete")

                          <div class="container">
                              <h1>Delete Opportunities</h1>
                              <p>Are you sure you want to delete your Opportunity?</p>

                              <div class="clearfix">
                                  <button type="button" class="cancelbtn">Cancel</button>
                                  <button type="button" class="deletebtn">Delete</button>
                              </div>
                          </div>
                      </form>
                  </div>




                   */


}
