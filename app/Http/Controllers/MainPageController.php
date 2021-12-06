<?php

namespace App\Http\Controllers;
use App\Models\volunteerwork;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class MainPageController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware(['auth','verified']);
    } */
    public function welcome()
    {
        // dd(auth()->user());

        return view('wel');

    }

    public function index()
    {
          //Role::create(['name' => 'admin']);
         //Permission::create(['name' => 'edit post']);
        //$role = Role::findById(1);
        //$permission = Permission::findById(2);
        //$role->givePermissionTo($permission);
        //$permission->removeRole($role);

        // dd(auth()->user());
        $name = DB::table('volunteerworks')->get();
        return view('Main', ['show' => $name]);

    }
    public function store(){
        auth()->logout();

        return redirect()->route('welcome');
    }

    public function indexC(){
        return view('CreateWork');
    }




    public function storeC(Request $request) {
        // dd($request->all());

        $request->validate([
            'Name' => 'required|min:3|max:10',//['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/']
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
