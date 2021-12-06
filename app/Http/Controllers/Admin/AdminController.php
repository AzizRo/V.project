<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\User;
use App\Models\volunteerwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use File;

class AdminController extends Controller
{
    public function index()
    {

        return view('Admin.admin', [
            'works' => DB::table('volunteerworks AS t1')
                ->select('t1.WorkID', 't1.Name', 't1.Description',
                    't1.Skills', 't1.Tasks',
                    't1.Benefits', 't1.Communication', 't1.Volunteernum',
                    't1.StartDate', 't1.EndDate', 't1.Duration', 't1.volunteer_hours',
                    't1.Gender', 't1.Major', 't1.status', 't1.Location', 't1.Field')
                ->join('users AS t2', 't2.id', '=', 't1.user_id')
                ->Where(['t1.status' => 'Waiting for approval'])
                //->orwhere('t1.Gender' ,'=', 'Male')
                //-> orWhere('t1.Gender', '=', 'Both')
                ->paginate(9)


        ]);


    }

    public function profile()
    {


        return view('Admin.profile');

    }

    public function users()
    {

        $users = User::where('work', 'faculty member')
            ->orwhere('work', 'administrative')
            ->take(10)
            ->get();

        return view('Admin.users2', compact('users'));
    }



    public function certificates()
    {


        $Certifcates = Certificate::all()->where("Status","=","طلب شهادة من صاحب العمل ");
        return view('Admin.Certificates', ['Certificates' => $Certifcates]);
    }

    public function GiveCertificates($id,$VolunteerName, $VolunteerId, $WorkId, $WorkName, $StartDate, $EndDate, $VolunteeringHours, $ProviderName)
    {
        //dd($VolunteerName);
          $img = Image::make(public_path('storage/Cer.jpg'));


          $img->text($VolunteerName, 1250, 700, function($font)   {
  // x= 1800, y= 1320,
              $font->file(public_path('storage/Lato-Regular.ttf'));
              $font->size(80);
              $font->color('#000000');


              $font->align('center');
              $font->valign('bottom');
              //$font->angle(90);
          });
          $img->text($WorkName, 1250, 976, function($font)   {
  // x= 1800, y= 1320,
              $font->file(public_path('storage/Lato-Regular.ttf'));
              $font->size(80);
              $font->color('#000000');


              $font->align('center');
              $font->valign('bottom');
              //$font->angle(90);
          });

          //start date
          $img->text($StartDate, 1630, 1075, function($font)   {
  // x= 1800, y= 1320,
              $font->file(public_path('storage/Lato-Regular.ttf'));
              $font->size(48);
              $font->color('#000000');


              $font->align('center');
              $font->valign('bottom');
              //$font->angle(90);
          });
  //end date
          $img->text($EndDate, 1268, 1075, function($font)   {
  // x= 1800, y= 1320,
              $font->file(public_path('storage/Lato-Regular.ttf'));
              $font->size(48);
              $font->color('#000000');


              $font->align('center');
              $font->valign('bottom');
              //$font->angle(90);
          });

  // hours
          $img->text($VolunteeringHours, 910, 1075, function($font)   {
  // x= 1800, y= 1320,
              $font->file(public_path('storage/Lato-Regular.ttf'));
              $font->size(48);
              $font->color('#000000');


              $font->align('center');
              $font->valign('bottom');
              //$font->angle(90);
          });

  // provider name
          $img->text($ProviderName, 1820, 1600, function($font)   {
  // x= 1800, y= 1320,
              $font->file(public_path('storage/Lato-Regular.ttf'));
              $font->size(55);
              $font->color('#000000');


              $font->align('center');
              $font->valign('bottom');
              //$font->angle(90);
          });
  //admin name
          $img->text('Abdullah Mohammed Alanazi  ', 600, 1600, function($font)   {
  // x= 1800, y= 1320,
              $font->file(public_path('storage/Lato-Regular.ttf'));
              $font->size(55);
              $font->color('#000000');


              $font->align('center');
              $font->valign('bottom');
              //$font->angle(90);
          });

          $path= 'app\public'.'\\'.$WorkId ;

          if(!File::exists(storage_path($path))) {

              File::makeDirectory (storage_path($path));

              $img->save(storage_path($path.'\\'.'Cer' .$VolunteerId.'.jpg'));

          }else{
              $img->save(storage_path($path.'\\'.'Cer' .$VolunteerId.'.jpg'));

          }

        $Certifcates = Certificate::where('id', '=', ($id))->first();

        $Certifcates->Status = "تمت الموافقة";
        $Certifcates->save();

          //dd(public_path($path.'\\'.'Cer' .$VolunteerId.'.jpg'));

        return redirect()->back()->with("success","You have successfully gave the Volunteer the certificate  opportunity");
    }

     /*public function CerApproval($WorkID)
   {
       $works = volunteerwork::where('WorkID', '=', ($WorkID))->first();
       if ($works) {
           $works->status = "Approved";
           $works->save();
           return redirect()->back()->with("success","successful approval");

       }
   }*/





    public function update(Request $request, $id)
    {
     $user= User::findOrFail($id);

      //  $requestData=$request;

        $user->update($request->except(['_token','roles']));
        //$roles = $request->input('roles') ? $request->input('roles') : [];
        $user->roles()->sync($request->roles);

        return redirect("users");
    }








    public function editC(User $user)
    {
        return view('Admin.edit2', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }
    /*public function edit(User $user)
    {

       // $roles = Role::get()->pluck('name', 'name');

       // return view('Admin.edit', compact('user', 'roles'));
        return view('Admin.edit', ['roles'=> Role::all()]);
    }*/




   /* public function delete($id)
    {
        $data=array(
            "list" =>DB::table("volunteerworks")->where("id",$id)->delete()
        );
        return view('Admin.admin', $data);


    }*/
    public function show($WorkID)
    {
        // give this to abdulaziz because you forget the information about the person who created the work
        if (Auth::check()) {
            return view('Admin.ShowWork', [
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


        } else {
            return redirect('/');
        }
    }

  /* public function approval(Request $request)
    {

        $list= volunteerwork::find($request->workId);
$approveVal=$request->is_approve;
if($approveVal=="on"){
    $approveVal=1;

}else{
    $approveVal=0;
}
        $list->is_approve=$approveVal;
        $list->save();
        return redirect()->back();
    }

  هذا ينحط داخل الادمن الزر
                    <form action="{{url("approve")}}" method="POST">
                              @csrf

                                <input class="btn btn-primary " type="submit" value="approve">
                                <input  @if($list->is_approve==1) {{"checked"}}@endif
                                    type="checkbox" id="scales" name="is_approve" >
                                <input type="hidden" name="workId" value="{{$list->id}}">

                            </form>


  */

    public function approval($WorkID)
    {
        $works = volunteerwork::where('WorkID', '=', ($WorkID))->first();
        if ($works) {
            $works->status = "Approved";
            $works->save();
            return redirect()->back()->with("success","successful approval");

        }
    }
    public function decline($WorkID)
    {
        $works = volunteerwork::where('WorkID', '=', ($WorkID))->first();
        if ($works) {
            $works->status = "Declined";
            $works->save();
            return redirect()->back()->with("success","successful decline ");

        }
    }
/*<form method="post" action="{{route('admin.decline',$work->WorkID)}}">
@csrf
<input type="hidden" name="businessID" value="$work->WorkID"/>
<button class="btn " type="submit">
Decline
</button>
</form>


<input type="hidden" name="businessID" value="$work->WorkID"/>
<button class="delete" onclick="document.getElementById('id01').style.display='block'" type="submit">
Approve
</button>


   Model /
<div id="id01" class="modal">
                                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                                <form class="modal-content" action="{{route('admin.approve',$work->WorkID)}}" method="post">
                                    @csrf

                                    <div class="container">
                                        <h1>Approve Opportunities</h1>
                                        <p>Are you sure you want to approve the Opportunity?</p>

                                        <div class="clearfix">
                                            <button type="button" class="cancelbtn">Cancel</button>
                                            <button type="button" class="deletebtn">Approve</button>
                                        </div>
                                    </div>
                                </form>
                            </div>


    */

}
