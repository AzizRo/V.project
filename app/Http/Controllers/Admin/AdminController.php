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
    // this function will return a all Volunteer Works that has status 'Waiting for approval' to the view Admin.admin.
    public function index()
    {
        if (Auth::check())
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
                ->paginate(9)


        ]);
        }
        else
        {
            return redirect('welcome');
        }


    }
    /* this function will return Admin profile page  */
    public function profile()
    {
        if (Auth::check())
        {

        return view('Admin.profile')->with("updateA", "تم تحديث  الحساب بنجاح");

        }
        else
        {
            return redirect('welcome');
        }

    }
    /* this function will update the phone number field if the Admin want to add a phone number */
    public function updateProfile(Request $request)
    {
        if (Auth::check())
        {

            $validation= $request->validate([
                'phone_no'=>'required',
            ]);
            $updating = DB::table("users")->where("id",$request->input("cid"))
                ->update([

                    'phone_no'=>$request->phone_no,
                    // 'work'=>$request->work,

                ]);

            return redirect()->back()->with("updateA","تم تحديث الحساب بنجاح");

        }
        else
        {
            return redirect('welcome');
        }


    }


    // this function will return the available Volunteer Work to admin
    public function show($WorkID)
    {
        if (Auth::check())
        {
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


        }
        else
        {
            return redirect('welcome');
        }
    }


    // This function will change  the  Status of the work when admin click approve button
    public function approval($WorkID)
    {
        if (Auth::check())
        {
            $works = volunteerwork::where('WorkID', '=', ($WorkID))->first();
            if ($works)
            {
                $works->status = "Approved";
                $works->save();
                return redirect()->back()->with("approval","تمت الموافقة بنجاح");
            }
            else
            {
                return redirect('welcome');
            }

        }
    }
    // This function will change  the  Status of the work when admin click decline button
    public function decline($WorkID)
    {
        if (Auth::check())
        {
            $works = volunteerwork::where('WorkID', '=', ($WorkID))->first();
            if ($works)
            {
                $works->status = "Declined";
                $works->save();
                return redirect()->back()->with("decline","تم الغاء الفرصة بنجاح ");
            }
            else
            {
                return redirect('welcome');
            }

        }
    }

    /* This function will make the admin see all the details of opportunity providers on the site */
    public function users()
    {
        if (Auth::check())
        {
            $users = User::where('work', 'faculty member')
                ->orwhere('work', 'administrative')
                ->get();

            return view('Admin.users2', compact('users'));

        }
        else
        {
            return redirect('welcome');
        }
    }

    public function editC(User $user)
    {
        if (Auth::check())
        {
            return view('Admin.edit2', [
                'user' => $user,
                'userRole' => $user->roles->pluck('name')->toArray(),
                'roles' => Role::latest()->get()
            ]);
        }
        else
        {
            return redirect('welcome');
        }
    }


    public function update(Request $request, $id)
    {
        if (Auth::check())
        {
            $user= User::findOrFail($id);

            //$user->update($request->except(['_token','roles']));
            $user->roles()->sync($request->roles);

            return redirect("users");
        }
        else
        {
            return redirect('welcome');
        }
    }





    // This function will return all the Certificates that has Status "طلب شهادة من صاحب العمل " to the view Admin.Certificates.
    public function certificates()
    {
        if (Auth::check())
        {

        $Certifcates = Certificate::all()->where("Status","=","طلب شهادة من صاحب العمل ");
        return view('Admin.Certificates', ['Certificates' => $Certifcates]);
        }
        else
        {
            return redirect('welcome');
        }
    }
    //  This function will create a Certificates with the name of the volunnter, Work Name, StartDate, EndDaete, VolunteeringHours, and the Provider name of the Volunteer Opportunity.
    public function GiveCertificates($id,$VolunteerName, $VolunteerId, $WorkId, $WorkName, $StartDate, $EndDate, $VolunteeringHours, $ProviderName)
    {
        if (Auth::check())
        {
            // Read Image from the selected path
          $img = Image::make(public_path('storage/Cer.jpg'));

            //Write on Image the VolunteerName with 1250 on x axis and 700 on y axis
          $img->text($VolunteerName, 1250, 700, function($font)
          {
              //Change the font of the text
              $font->file(public_path('storage/Lato-Regular.ttf'));
              //Change the font of the text
              $font->size(80);
              //Change the color of the text
              $font->color('#000000');
              //Horizontal Alignment
              $font->align('center');
              //Vertical Alignment
              $font->valign('bottom');

          });
            //  WorkName
            $img->text($WorkName, 1250, 976, function($font)
            {
              $font->file(public_path('storage/Lato-Regular.ttf'));
              $font->size(80);
              $font->color('#000000');
              $font->align('center');
              $font->valign('bottom');
          });
            //  StartDate
          $img->text($StartDate, 1630, 1075, function($font)
          {
              $font->file(public_path('storage/Lato-Regular.ttf'));
              $font->size(48);
              $font->color('#000000');
              $font->align('center');
              $font->valign('bottom');
          });
            //  EndDate
            $img->text($EndDate, 1268, 1075, function($font)
            {
              $font->file(public_path('storage/Lato-Regular.ttf'));
              $font->size(48);
              $font->color('#000000');
              $font->align('center');
              $font->valign('bottom');
          });
            // $VolunteeringHours
            $img->text($VolunteeringHours, 910, 1075, function($font)
            {
              $font->file(public_path('storage/Lato-Regular.ttf'));
              $font->size(48);
              $font->color('#000000');
              $font->align('center');
              $font->valign('bottom');
          });
            // provider name
            $img->text($ProviderName, 1820, 1600, function($font)
            {
              $font->file(public_path('storage/Lato-Regular.ttf'));
              $font->size(55);
              $font->color('#000000');
              $font->align('center');
              $font->valign('bottom');

          });
            //  admin name
          $img->text('Mohamed Ali Hamdi  ', 600, 1600, function($font)
          {
              $font->file(public_path('storage/Lato-Regular.ttf'));
              $font->size(55);
              $font->color('#000000');
              $font->align('center');
              $font->valign('bottom');
          });
            //  $path is the name of the path that  the image will be saved to after modification
          $path= 'app\public'.'\\'.$WorkId ;

            // if the folder doesn't exits, than make a folder and create the certifcate with the VolunteerID to the name of Certifcate
            if(!File::exists(storage_path($path)))
            {

              File::makeDirectory (storage_path($path));

              $img->save(storage_path($path.'\\'.'Cer' .$VolunteerId.'.jpg'));
                // if the folder exits than, just create the certifcate with the VolunteerID to the name of Certifcate
            }
            else
            {
              $img->save(storage_path($path.'\\'.'Cer' .$VolunteerId.'.jpg'));
            }
            //Change the status of Certifcate to "تمت الموافقة"
            $Certifcate = Certificate::where('VolunteerId', '=', $VolunteerId)->where('WorkId', '=', $WorkId)->first();
            $Certifcate->Status = "تمت الموافقة على الشهادة";
            $Certifcate->save();

            return redirect()->back()->with("success","تم اصدار الشهادة التطوعية للمتطوع");
            }
          else
            {
            return redirect('welcome');
             }
    }

}
