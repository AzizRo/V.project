<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // dd(auth()->user());
        $name = DB::table('volunteerworks')->get();
        return view('admin', ['show' => $name]);

    }
    public function delete($id)
    {

        $data=array(
            "show" =>DB::table("volunteerworks")->where("id",$id)->delete()
        );
        return view('admin', $data);

    }
    public function show($id)
    {

        $row = DB ::table("volunteerworks")
            ->where("id", "=",$id)
            ->first();
        $data = [
            "Info"=>$row
        ];

        return view('ShowWork' , $data);
    }




}
