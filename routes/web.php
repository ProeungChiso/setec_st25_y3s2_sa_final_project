<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\GeminiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
|--------------------------------------------------------------------------
| Public View Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'index');

Route::prefix('blog')->group(function () {
    Route::view('/', 'user.blog.index')->name('blog.index');
    Route::view('/detail', 'user.blog-detail.index')->name('blog.detail');
    Route::view('/edit', 'user.blog-edit.index')->name('blog.edit');
});

Route::view('/about', 'user.about.index')->name('about');
Route::view('/setting', 'user.setting.index')->name('settings');

/*
|--------------------------------------------------------------------------
| Protected Routes (Requires Auth)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::view('/profile', 'user.profile.index')->name('profile');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::put('/profile', [UserController::class, 'updateUserInfo'])->name('info.update');
    Route::put('/password', [UserController::class, 'updatePassword'])->name('password.update');
    Route::put('/avatar', [UserController::class, 'updateAvatar'])->name('avatar.update');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::controller(AuthController::class)->group(function () {
    Route::view('/login', 'auth.login')->name('login.form');
    Route::post('/login', 'login')->name('login');

    Route::view('/register', 'auth.register')->name('register.form');
    Route::post('/register', 'register')->name('register');
});

/*
|--------------------------------------------------------------------------
| File Upload Routes
|--------------------------------------------------------------------------
*/

Route::post('/upload-images', [ImageController::class, 'store'])->name('upload-image');

/*
|--------------------------------------------------------------------------
| Blog Routes
|--------------------------------------------------------------------------
*/

Route::controller(BlogController::class)->group(function () {
    Route::get('/', 'getNumberBlogsAndUsers')->name('index');
    Route::get('/profile', 'getBlogsByOwner')->name('user.profile.index');
    Route::get('/blog', 'getBlogsByPublished')->name('user.blog.index');
    Route::get('/blog/{blog}', 'getBlogDetail')->name('user.blog-detail.index');
    Route::get('/blog/{blog}/edit', 'getBlogEdit')->name('user.blog-edit.index');
    Route::post('/new-blog', 'createBlog')->name('user.profile.index');
    Route::put('/blog/{id}/edit', 'editBlog')->name('user.blog-edit.index');
    Route::delete('/delete-blog/{id}', 'deleteBlog')->name('user.profile.index');
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::controller(UserController::class)->group(function () {

});

/*
|--------------------------------------------------------------------------
| Feedback Routes
|--------------------------------------------------------------------------
*/

Route::post('/new-feedback', [FeedbackController::class, 'newFeedback'])->name('new.feedback');

/*
|--------------------------------------------------------------------------
| Reset Password Routes
|--------------------------------------------------------------------------
*/

Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('reset.password');
Route::get('/reset-password', [ResetPasswordController::class, 'resetPasswordView'])->name('reset.password.view');

