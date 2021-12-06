<?php

namespace App\Http\Controllers;

use App\Models\volunteerwork;
use Illuminate\Http\Request;

class VolunteerWorkController extends Controller
{

    public function index(){
        return view('CreateWork');
    }






    public function store(Request $request) {
       // dd($request->all());

        $request->validate([
            'Name' => 'required|min:5|max:10',//['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/']
            'Description' => 'required',
            'Goals' => 'required',
            'Targeted' => 'required',
            'Volunteernum' => 'required',
            'Period' => 'required',
            'Communication' => 'required',
            'SpecializeId' => 'required',
            'LocationId' => 'required',
            'FieldId' => 'required',
            'Gender' => 'required',
        ]);

        volunteerwork::create([
            'Name'=>$request->Name,
            'Description'=>$request->Description,
            'Goals'=>$request->Goals,
            'Targeted'=>$request->Targeted,
            'Volunteernum'=>$request->Volunteernum,
            'Period'=>$request->Period,
            'Communication'=>$request->Communication,
            'SpecializeId'=>$request->SpecializeId,
            'LocationId'=>$request->LocationId,
            'FieldId'=>$request->FieldId,
            'Gender'=>$request->Gender,


        ]);

        return redirect()->route('Main')->with('success', 'Logged In Successfully');
    }


}
