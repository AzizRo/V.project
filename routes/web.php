<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



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


//welcome, Page

Route::get('welcome', [App\Http\Controllers\Registration\WelcomeController::class, 'index']);
//Starts  AlreadyLoggedIn middleware for only logged-in users can not see all these pages
Route::get('Register', [App\Http\Controllers\Registration\RegisterController::class, 'index'])->name('Register')->middleware("AlreadyLoggedIn");
Route::post('Register', [App\Http\Controllers\Registration\RegisterController::class, 'store']);

Route::get('Login', [App\Http\Controllers\Registration\LoginController::class, 'index'])->name('Login')->middleware("AlreadyLoggedIn");
Route::post('Login', [App\Http\Controllers\Registration\LoginController::class, 'store']);

//Ends AlreadyLoggedIn middleware for only logged-in users can not see all these pages
Route::get('/user/verify/{token}', [App\Http\Controllers\Registration\RegisterController::class, 'verifyEmail'])->name('user.verify');

Route::get('forgot-password', [App\Http\Controllers\Authentication\ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forget.password.get')->middleware('guest');
Route::post('forgot-password', [App\Http\Controllers\Authentication\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [App\Http\Controllers\Authentication\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [App\Http\Controllers\Authentication\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::post('logout', [App\Http\Controllers\Home\HomeController::class, 'logout'])->name('logout');



//Starts authorization middleware for only logged-in users can see all these pages
Route::middleware('role:auth')->group(function () {
                                            //home pages
Route::get('home', [App\Http\Controllers\Home\HomeController::class, 'index'])->name('home');
Route::get('home/show/{WorkID}', [App\Http\Controllers\Home\HomeController::class, 'show']);

Route::post('CreateWork/show/{WorkID}', [App\Http\Controllers\Home\HomeController::class, 'register']);

Route::get('home/Finished', [App\Http\Controllers\Home\HomeFinishedController::class,'index'])->name('Finished');
Route::get('ShowFinished/{WorkID}', [App\Http\Controllers\Home\HomeFinishedController::class,'show']);


//Starts authorization middleware only for provider that means just provider can see all these pages
Route::middleware('role:volunteer provider')->group(function ()
{
Route::get('CreateWork', [App\Http\Controllers\Home\CreateWorkController::class, 'index'])->name('CreateWork');//->middleware("role:volunteer provider");
Route::post('CreateWork', [App\Http\Controllers\Home\CreateWorkController::class, 'store']);

});
//Ends authorization middleware only for provider that means just provider can see all these pages


//profile pages
Route::get('profile', [App\Http\Controllers\Home\ProfileController::class, 'index']);
Route::post('profile/update', [App\Http\Controllers\Home\ProfileController::class, 'update'])->name("profile/update");

Route::get('AcoountInformation', [App\Http\Controllers\Home\AcoountInformationController::class, 'index']);
Route::post('Account/update', [App\Http\Controllers\Home\AcoountInformationController::class, 'update'])->name("Account/update");


//Starts authorization middleware only for  Specific provider that means just Specific provider can see all these pages
Route::get('ApproveMyOpportunity', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'approveOpportunity'])->name('role:certificate');
Route::get('MyOpportunity/Approve/{WorkID}', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'approval'])->name('provider.approve');
Route::get('MyOpportunity/decline/{WorkID}', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'decline'])->name('provider.decline');
//Ends authorization middleware only for Specific provider

//Starts authorization middleware only for provider that means just provider can see all these pages
Route::middleware('role:volunteer provider')->group(function () {

Route::get('Volunteers/show/{WorkID}/{Name}/{StartDate}/{EndDate}/{volunteer_hours}/{first_name}/{middle_name}/{family_name}', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'showVolunteers']);
Route::get('GiveCertificate/{VolunteerName}/{VolunteerId}/{WorkId}/{WorkName}/{StartDate}/{EndDate}/{VolunteeringHours}/{ProviderName}', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'GiveCertificate']);

Route::get('MyVolunteerWorks', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'index']);

Route::get('opportunity/delete/{WorkID}', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'Delete'])->name("opportunity.delete");

Route::get('MyVolunteerWorks/show/{WorkID}', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'show']);

Route::get('MyVolunteerWorks/update/{WorkID}', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'editshow']);
Route::post('MyVolunteerWorks/update', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'update']);

    });
//Ends authorization middleware only for provider


Route::get('MyVolunteerOpportunities', [App\Http\Controllers\Home\MyVolunteerOpportunitiesController::class,'index'])->name('MyVolunteerOpportunities');
Route::get('MyVolunteerOpportunities/show/{id}', [App\Http\Controllers\Home\MyVolunteerOpportunitiesController::class, 'show']);
Route::get('MyVolunteerOpportunities/delete/{WorkID}/{StartDate}', [App\Http\Controllers\Home\MyVolunteerOpportunitiesController::class, 'Delete'])->name("MyVolunteerOpportunities.delete");

Route::get('certificate', [App\Http\Controllers\Home\MyVolunteerWorksController::class, 'showcertificate']);

//Starts authorization middleware only for admin that means just admin can see all these pages
Route::middleware('role:admin')->group(function ()
{
//Admin pages
Route::get('Admin2', [App\Http\Controllers\Admin\AdminController::class, 'index']);
Route::get('Admin2/profile', [App\Http\Controllers\Admin\AdminController::class, 'profile']);
Route::post('Admin2/profile/update', [App\Http\Controllers\Admin\AdminController::class, 'updateProfile'])->name("Admin2/profile/update");

//certificates approval from admin
Route::get('Admin2/certificates', [App\Http\Controllers\Admin\AdminController::class, 'certificates'])->name('admin.certificates');
Route::get('GiveCertificates/{id}/{VolunteerName}/{VolunteerId}/{WorkId}/{WorkName}/{StartDate}/{EndDate}/{VolunteeringHours}/{ProviderName}', [App\Http\Controllers\Admin\AdminController::class, 'GiveCertificates'])->name('Cer.approve');
Route::get('CerApproval/{WorkID}', [App\Http\Controllers\Admin\AdminController::class, 'CerApproval'])->name('certificate.approve');


Route::get('users', [App\Http\Controllers\Admin\AdminController::class, 'users']);

Route::get('/{user}/edit', [App\Http\Controllers\Admin\AdminController::class, 'editC'])->name('users.edit');
Route::post('Role/update/{id}', [App\Http\Controllers\Admin\AdminController::class, 'update']);


Route::get('admin/show/{WorkID}', [App\Http\Controllers\Admin\AdminController::class, 'show']);
Route::post('approve/{WorkID}', [App\Http\Controllers\Admin\AdminController::class, 'approval'])->name('admin.approve');
Route::post('decline/{WorkID}', [App\Http\Controllers\Admin\AdminController::class, 'decline'])->name('admin.decline');

 });
//Ends authorization middleware only for admin that means just admin can see all these pages



});
//Ends authorization middleware for only logged-in users can see all these pages


























