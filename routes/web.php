<?php

use App\Http\Controllers\auth\EmailVerificationController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\ResetPasswordController;
use App\Http\Controllers\post\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\auth\LoginController;
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
Route::get('/', function (){
    return view('home');
})->name('home');

Route::post('/logout', [LogoutController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/create', [PostController::class, 'create'])
    ->name('create')
    ->middleware('auth');
Route::post('/create', [PostController::class, 'store']);

Route::get('/posts', [PostController::class, 'posts'])
    ->name('posts');


//-----------------------------------------------------------------------


Route::get('forget-password', [ResetPasswordController::class, 'showForgetPasswordForm'])
    ->name('forget.password.get');
Route::post('forget-password', [ResetPasswordController::class, 'submitForgetPasswordForm'])
    ->name('forget.password.post');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])
    ->name('reset.password.get');
Route::post('reset-password', [ResetPasswordController::class, 'submitResetPasswordForm'])
    ->name('reset.password.post');


//Route::get('/forgot-password', [ResetPasswordController::class, 'reset'])
//    ->middleware('guest')
//    ->name('password.request');
//
//
//Route::post('/forgot-password', [ResetPasswordController::class, 'request'])
//    ->middleware('guest')
//    ->name('password.email');


//-----------------------------------------------------------------------


//email verification -------------------------------------------------------------------------


Route::get('/email/verify', [EmailVerificationController::class, 'show'])
    ->middleware('auth')
    ->name('verification.notice');

Route::post('/email/verification-notification', [EmailVerificationController::class, 'request'])
    ->middleware('auth', 'throttle:6,1')
    ->name('verification.send');

Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');


//-------------------------------------------------------------------------


Route::delete('/posts/{post}', [PostController::class, 'destroy'])
    ->name('posts.destroy')
    ->middleware('auth');

Route::get('/posts/{id}', [PostController::class, 'show']);
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])
    ->name('posts.likes')
    ->middleware('auth');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])
    ->name('posts.likes')
    ->middleware('auth');
Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])
    ->name('users.posts')
    ->middleware('auth');






