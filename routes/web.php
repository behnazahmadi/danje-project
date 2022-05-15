<?php

use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Auth\LoginWithGoogle;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\Blog\BlogController;
use App\Http\Controllers\Frontend\BookmarkController;
use App\Http\Controllers\Frontend\Comment\CommentController;
use App\Http\Controllers\Frontend\Contact\ContactUsController;
use App\Http\Controllers\Frontend\Gallery\GalleryController;
use App\Http\Controllers\Frontend\Panel\EditProfileController;
use App\Http\Controllers\Frontend\Panel\IndexController;
use App\Http\Controllers\Frontend\Panel\NotificationController;
use App\Http\Controllers\Frontend\Ticket\TicketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
//    auth()->loginUsingId(1);
    return view('index');
})->name("index");

//  login with Google account
Route::get("login/google/redirect",[LoginWithGoogle::class,"redirect"])->name("login.google.redirect");
Route::get("login/google/callback",[LoginWithGoogle::class,"callback"])->name("login.google.callback");

// contact-us form
Route::get("contact-us",[ContactUsController::class,"index"])->name("contact-us");
Route::post("contact-us",[ContactUsController::class,"saveMessage"])->name("contact-us.store");

// show all blog in the page
Route::get("blogs",[BlogController::class,"index"])->name("blogs");

// single blog page
Route::get("blogs/{blog:slug}",[BlogController::class,"show"])->name("blogs.show");

// comments
Route::post("comments",[CommentController::class,"store"])->name("comment.store");

// galleries
Route::get("galleries",[GalleryController::class,'Index'])->name("galleries.index");

Route::get("about-us",[AboutUsController::class,"index"])->name("about-us");

Route::prefix("panel")->as("panel.")->middleware("auth")->group(function (){

    // main panel
    Route::get("/",[IndexController::class,"index"])->name("index");

    // edit profile user
    Route::get("editProfile",[EditProfileController::class,"index"])->name("editProfile");
//    Route::post("editProfile",[EditProfileController::class,"storeUserInfo"])->name("editProfile.store");

    // change password user
    Route::get("changePassword",[EditProfileController::class,"changePasswordView"])->name("changePassword");
    Route::post("changePassword",[EditProfileController::class,"changePassword"])->name("changePassword");

    Route::get("notifications",[NotificationController::class,"index"])->name("notifications");

    Route::get("tickets",[TicketController::class,"index"])->name("tickets.index");
    Route::get("tickets/create",[TicketController::class,"create"])->name("tickets.create");
    Route::get("tickets/{ticket}",[TicketController::class,"show"])->name("tickets.show");
    Route::post("tickets",[TicketController::class,"store"])->name("tickets.store");

    Route::get("bookmark",[BookmarkController::class,'index'])->name("bookmark.index");
});

// admin login form
Route::get("admin/auth/login",[LoginAdminController::class,"index"])->name("admin.login.index");
Route::post("admin/auth/login",[LoginAdminController::class,"login"])->name("admin.login");


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');




// * TODO add the html template to project
// * TODO modify the register and login page and added some column to their tables
// * TODO add the login with google feather to login and register pages
// * TODO automatic users get login after registration
// * TODO role and permissions
// * TODO panel admin
// * TODO blog
// * TODO category
// * TODO users
// * TODO comments
// * TODO panel user
// * TODO contact - us
// * TODO social networks
// * TODO pictures gallery
// * TODO add the file-manager  package for blogs
// * TODO refactor in view and show details on it
// * TODO send email and notification to user
// * TODO show the comments of blog in the page
// * TODO tickets admin panel

// TODO register by phone
// TODO search in products / project
// TODO support
// TODO favorites



// TODO RateLimiter(Throttle) in RouteServiceProvider
