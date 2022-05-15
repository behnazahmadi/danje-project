<?php


use App\Http\Controllers\Admin\Access\PermissionController;
use App\Http\Controllers\Admin\Access\RoleController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Comment\CommentController;
use App\Http\Controllers\Admin\Contact\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Gallery\GalleryController;
use App\Http\Controllers\Admin\Message\MessageController;
use App\Http\Controllers\Admin\SocialNetwork\socialNetworkController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Admin\User\AccessUserController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware("auth")->group(function (){

    Route::get("/",[DashboardController::class,"index"])->name("dashboard");

    // users
    Route::resource("users",UserController::class);

    // blogs
    Route::resource("blogs",BlogController::class);

    // categories
    Route::resource("categories", CategoryController::class);

    // roles
    Route::resource("roles", RoleController::class);

    // permissions
    Route::resource("permissions", PermissionController::class);

    // tags
    Route::resource("tags", TagController::class);

    // comments
    Route::resource("comments", CommentController::class);

    // social_networks
    Route::resource("social_networks", socialNetworkController::class);

    // galleries
    Route::resource("galleries", GalleryController::class);

    // replay comment admin
    Route::get("comments/{comment}/replay",[CommentController::class,"replay"])->name("comments.replay");
    Route::post("comments/{comment}/replay",[CommentController::class,"saveReplay"])->name("comments.replay.store");

    // give the user permission
    Route::get("users/{user}/permissions",[AccessUserController::class,"permissions"])->name("user.permissions");
    Route::post("users/{user}/permissions",[AccessUserController::class,"savePermissions"])->name("user.permissions.store");

    // contacts
    Route::get("contacts",[ContactUsController::class,"index"])->name("contacts.index");
    Route::delete("contacts/{contact}",[ContactUsController::class,"destroy"])->name("contacts.destroy");

   // replay admin contacts
    Route::get("contacts/{contact}/replay",[ContactUsController::class,"replay"])->name("contacts.replay");
    Route:: post("contacts/{contact}/replay",[ContactUsController::class,"saveReplay"])->name("contacts.replay.store");

    // send messages to user
    Route::get("messages",[MessageController::class,"index"])->name("messages.index");
    Route::post("messages",[MessageController::class,"store"])->name("messages.store");

    // delete messages
    Route::delete("messages/{message}",[MessageController::class,"destroy"])->name("messages.destroy");

    //  tickets
    Route::resource("tickets", TicketController::class);
    Route::get("tickets/{ticket}/replay",[TicketController::class,"replay"])->name("tickets.replay");
    Route::post("tickets/{ticket}/replay",[TicketController::class,"saveReplay"])->name("tickets.replay.store");
});
