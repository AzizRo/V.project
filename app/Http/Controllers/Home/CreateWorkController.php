<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use App\Models\volunteerwork;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CreateWorkController extends Controller
{
    //this function will return view Home.AcoountInformation
    public function index()
    {
        if (Auth::check())
        {
        return view('Home.CreateWork');
        }

        else
        {

            return redirect('welcome');
        }
    }

    //this function will validate the inputs to a given criteria
    public function store(Request $request)
    {

        if (Auth::check())
        {
            $request->validate([
                'Name' => 'required',//['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/']
                'Description' => 'required',
                'Skills' => 'required',
                'Tasks' => 'required',
                'Benefits' => 'required',
                'Communication' => 'required',
                'Volunteernum' => 'required',
                'StartDate' => 'required',
                'EndDate' => 'required',
                'volunteer_hours' => 'required',
                'Gender' => 'required',
                'Major' => 'required',
                'Location' => 'required',
                'Field' => 'required',
            ]);


            $StartDate = strtotime($request->StartDate);
            $EndDate = strtotime($request->EndDate);
            $Diffrence = (($EndDate - $StartDate) / 86400) + 1;

            /*create() will create a row with the given inputs names to volunteerwork table */
            volunteerwork::create([
                'Name' => $request->Name,
                'Description' => $request->Description,
                'Skills' => $request->Skills,
                'Tasks' => $request->Tasks,
                'Benefits' => $request->Benefits,
                'Communication' => $request->Communication,
                'Volunteernum' => $request->Volunteernum,
                'StartDate' => $request->StartDate,
                'EndDate' => $request->EndDate,
                'Duration' => $Diffrence,
                'volunteer_hours' => $request->volunteer_hours,
                'Gender' => $request->Gender,
                'Major' => json_encode($request->Major),
                'Location' => $request->Location,
                'Field' => $request->Field,
                'user_id' => auth()->id()


            ]);


            return redirect()->route('home')->with('success', 'Logged In Successfully');
        }

        else
        {

                return redirect('welcome');
         }
        }

}
