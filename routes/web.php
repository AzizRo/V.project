<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VolnteerController;
use App\Http\Controllers\VolunteerWorkController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MainPageController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Authentication\ForgotPasswordController;
use App\Http\Controllers\Home\CreateWorkController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Registration\LoginController;
use App\Http\Controllers\Registration\LogoutController;

//use App\Http\Controllers\PasswordResetController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/


                                     //welcome pages

Route::get('/', [App\Http\Controllers\Registration\WelcomeController::class, 'index']);




Route::get('Register', [App\Http\Controllers\Registration\RegisterController::class, 'index'])->name('Register')->middleware("AlreadyLoggedIn");
Route::post('Register', [App\Http\Controllers\Registration\RegisterController::class, 'store']);

Route::get('Login', [App\Http\Controllers\Registration\LoginController::class, 'index'])->name('Login')->middleware("AlreadyLoggedIn");
Route::post('Login', [App\Http\Controllers\Registration\LoginController::class, 'store']);


Route::get('/user/verify/{token}', [App\Http\Controllers\Registration\RegisterController::class, 'verifyEmail'])->name('user.verify');




Route::get('forgot-password', [App\Http\Controllers\Authentication\ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forget.password.get')->middleware('guest');
Route::post('forgot-password', [App\Http\Controllers\Authentication\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [App\Http\Controllers\Authentication\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [App\Http\Controllers\Authentication\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');



Route::post('logout', [App\Http\Controllers\Home\HomeController::class, 'logout'])->name('logout');

//volunteer role
//                     ///home pages

                            // auth role for all pages
Route::middleware('role:auth')->group(function () {

Route::get('home', [App\Http\Controllers\Home\HomeController::class, 'index'])->name('home');
Route::get('home/test', [App\Http\Controllers\Home\HomeController::class, 'test']);//->middleware("role:volunteer");

Route::get('home/cer', [App\Http\Controllers\Home\HomeController::class, 'makeimage']);//->middleware("role:volunteer");


    Route::get('/phpinfo', function() {
        return phpinfo();
    });

Route::get('send', [App\Http\Controllers\Home\HomeController::class,'sendNotification']);


// الثاني بطريقة عبدالله
Route::get('home/show/{WorkID}', [App\Http\Controllers\Home\HomeController::class, 'show']);

//this route for volunteer who wants register

// التسجيل الثاني
Route::post('CreateWork/show/{WorkID}', [App\Http\Controllers\Home\HomeController::class, 'register']);

Route::get('home/Finished', [App\Http\Controllers\Home\HomeFinishedController::class,'index'])->name('Finished');
Route::get('ShowFinished/{WorkID}', [App\Http\Controllers\Home\HomeFinishedController::class,'show']);

// for provider

Route::middleware('role:volunteer provider')->group(function () {
 Route::get('CreateWork', [App\Http\Controllers\Home\CreateWorkController::class, 'index'])->name('CreateWork');//->middleware("role:volunteer provider");
Route::post('CreateWork', [App\Http\Controllers\Home\CreateWorkController::class, 'store']);

    });


//Route::get('profile/show/{id}', [App\Http\Controllers\Home\ProfileController::class, 'show']);



//volunteer role
                                      //profile pages
Route::get('profile', [App\Http\Controllers\Home\ProfileController::class, 'index']);

Route::post('profile/update', [App\Http\Controllers\Home\ProfileController::class, 'update'])->name("profile/update");



Route::get('AcoountInformation', [App\Http\Controllers\Home\AcoountInformationController::class, 'index']);
Route::post('Account/update', [App\Http\Controllers\Home\AcoountInformationController::class, 'update'])->name("Account/update");


// volunteer provider
Route::middleware('role:volunteer provider')->group(function () {

Route::get('Volunteers/show/{WorkID}/{Name}/{StartDate}/{EndDate}/{volunteer_hours}/{first_name}/{middle_name}/{family_name}', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'showVolunteers']);
Route::get('GiveCertificate/{VolunteerName}/{VolunteerId}/{WorkId}/{WorkName}/{StartDate}/{EndDate}/{VolunteeringHours}/{ProviderName}', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'GiveCertificate']);



Route::get('MyVolunteerWorks', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'index']);

Route::get('opportunity/delete/{WorkID}', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'Delete'])->name("opportunity.delete");

Route::get('MyVolunteerWorks/show/{WorkID}', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'show']);

Route::get('MyWorkRegistered/show/{WorkID}', [App\Http\Controllers\Home\MyWorkRegisteredController::class, 'show']);

Route::get('MyVolunteerWorks/update/{WorkID}', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'editshow']);
Route::post('MyVolunteerWorks/update', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'update']);

    });

// for  volunteers and provider
Route::get('MyVolunteerOpportunities', [App\Http\Controllers\Home\MyVolunteerOpportunitiesController::class,'index'])->name('MyVolunteerOpportunities');
//Route::get('MyVolunteerWorks/delete/{id}', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'delete']);
Route::get('MyVolunteerOpportunities/show/{id}', [App\Http\Controllers\Home\MyVolunteerOpportunitiesController::class, 'show']);
//cancle
//Route::get('MyVolunteerOpportunities/cancel/{id}', [App\Http\Controllers\Home\MyVolunteerOpportunitiesController::class, 'Delete'])->name("Myopportunity.delete");




//certificate
Route::get('certificate', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'showcertificate']);//->middleware("role:volunteer");






// Profile routes
// admin role


                                        //Admin pages
Route::middleware('role:admin')->group(function () {



Route::get('Admin2', [App\Http\Controllers\Admin\AdminController::class, 'index']);//->middleware("role:admin");
//Route::get('Admin2', [App\Http\Controllers\Admin\AdminController::class, 'index2']);
Route::get('Admin2/profile', [App\Http\Controllers\Admin\AdminController::class, 'profile']);

//certificates
Route::get('Admin2/certificates', [App\Http\Controllers\Admin\AdminController::class, 'certificates'])->name('admin.certificates');
Route::get('GiveCertificates/{id}/{VolunteerName}/{VolunteerId}/{WorkId}/{WorkName}/{StartDate}/{EndDate}/{VolunteeringHours}/{ProviderName}', [App\Http\Controllers\Admin\AdminController::class, 'GiveCertificates'])->name('Cer.approve');

//Route::post('approve/{WorkID}', [App\Http\Controllers\Admin\AdminController::class, 'approval'])->name('admin.approve');


Route::get('users', [App\Http\Controllers\Admin\AdminController::class, 'users']);//->middleware("role:admin");

Route::get('/{user}/edit', [App\Http\Controllers\Admin\AdminController::class, 'editC'])->name('users.edit');
//Route::get('Admin2/show/{id}', [App\Http\Controllers\Admin\AdminController::class, 'ShowRoles']);
Route::post('Role/update/{id}', [App\Http\Controllers\Admin\AdminController::class, 'update']);


Route::get('admin/show/{WorkID}', [App\Http\Controllers\Admin\AdminController::class, 'show']);
Route::post('approve/{WorkID}', [App\Http\Controllers\Admin\AdminController::class, 'approval'])->name('admin.approve');
Route::post('decline/{WorkID}', [App\Http\Controllers\Admin\AdminController::class, 'decline'])->name('admin.decline');



    });

});


























