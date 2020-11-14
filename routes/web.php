<?php

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
/*Home*/
Route::get('/', [\App\Http\Controllers\PostController::class, 'UserPosts']);

/*Specific post*/
Route::get('/New/{id}', [\App\Http\Controllers\PostController::class, 'UserPost']);

/*Posts of category*/
Route::get('/News/{name}', [\App\Http\Controllers\PostController::class, 'Categorynews']);

///*Privacy and policy*/
Route::get('/Privacy&Policy', function () {
    return view('Users.privacy&policy');
});

/*Message*/
Route::post('/sendmessage', [\App\Http\Controllers\MessageController::class, 'Send']);

/*profile*/
Route::middleware(['auth:sanctum', 'verified'])->get('/profile', function () {
    return view('profile.show');
})->name('dashboard');

/*logout*/
Route::get('/userLogout', function () {
    Auth::logout();
    return redirect()->back();
})->name('userLogout');

/*Comment*/
Route::post('/Comment/{postid}', [\App\Http\Controllers\CommentController::class, 'Comment']);

/*delete comment*/
Route::post('/deletecomment', [\App\Http\Controllers\CommentController::class, 'deletecomment']);

/*update comment*/
Route::post('/updatecomment/{commentid}', [\App\Http\Controllers\CommentController::class, 'updatecomment']);

/******Social auth******/

Route::get('login/facebook', [\App\Http\Controllers\UserController::class, 'redirectToProvider'])->name('facebookauth');
Route::get('login/facebook/callback', [\App\Http\Controllers\UserController::class, 'handleProviderCallback']);

Route::get('/CreatePassword',[\App\Http\Controllers\UserController::class,'CreatePasswordForm']);

Route::post('/createpasswordclick',[\App\Http\Controllers\UserController::class,'createpassword']);
/***Admin*****/
Route::prefix('/Admins')->group(function () {
    //loginFOrm
    Route::get('/Login', [\App\Http\Controllers\AdminController::class, 'LoginForm']);

    //login
    Route::post('/LoginClick', [\App\Http\Controllers\AdminController::class, 'Login']);

    //Home
    Route::get('/Home', [\App\Http\Controllers\AdminController::class, 'home'])->middleware('auth:admin');

    //logout
    Route::get('/logout', [\App\Http\Controllers\AdminController::class, 'logout'])->middleware('auth:admin');

   //posts
    Route::get('/Posts', [\App\Http\Controllers\PostController::class, 'AdminPosts'])->middleware('auth:admin');

    //addpostform
    Route::get('/AddPost', [\App\Http\Controllers\PostController::class, 'addform'])->middleware('auth:admin');

    //addpost
    Route::post('/Addclick', [\App\Http\Controllers\PostController::class, 'add'])->middleware('auth:admin');

    //delete post
    Route::post('/Deletepost/{id}', [\App\Http\Controllers\PostController::class, 'delete'])->middleware('auth:admin');

    //updatepost form
    Route::get('/Updatepost/{id}', [\App\Http\Controllers\PostController::class, 'updateform'])->middleware('auth:admin');

    //update post
    Route::post('/Updatepostclick/{id}', [\App\Http\Controllers\PostController::class, 'update'])->middleware('auth:admin');

    //users
    Route::get('/Users', [\App\Http\Controllers\UserController::class, 'AdminUsers'])->middleware('auth:admin');

    //update user
    Route::get('/UpdateUser/{id}',[\App\Http\Controllers\UserController::class,'AdminUpdateUserForm'])->middleware('auth:admin');

    //update user
    Route::post('/UpdateUserclick/{id}',[\App\Http\Controllers\UserController::class,'AdminUpdateUser'])->middleware('auth:admin');

    //delete user
    Route::post('/deleteUser/{id}', [\App\Http\Controllers\UserController::class, 'deleteUser'])->middleware('auth:admin');

    //messages
    Route::get('/Messages', [\App\Http\Controllers\MessageController::class, 'Messages'])->middleware('auth:admin');;

    //delete message
    Route::post('/deletemessage/{id}',[\App\Http\Controllers\MessageController::class,'deletemessage'])->middleware('auth:admin');;

    //comments
    Route::get('/Comments', [\App\Http\Controllers\CommentController::class, 'comments'])->middleware('auth:admin');;

    //deletecomment
    Route::post('/deletecomment/{id}',[\App\Http\Controllers\CommentController::class,'Admindeletecomment'])->middleware('auth:admin');;

    //Profile
    Route::get('/Profile', [\App\Http\Controllers\AdminController::class, 'profileform'])->middleware('auth:admin');;

    //change information
    Route::post('/changeinfo',[\App\Http\Controllers\AdminController::class,'updateinformation'])->middleware('auth:admin');;

    //change password
    Route::post('/changepassword',[\App\Http\Controllers\AdminController::class,'updatepassword'])->middleware('auth:admin');;

});

