<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class)->names('dashboard');
    Route::resource('banner', BannerController::class)->names('banner');
    Route::resource('about', AboutController::class)->names('about')->only(['store', 'update', 'index']);


    Route::resource('roles', RoleController::class)->names('roles');
    Route::resource('users', UserController::class)->names('users');
    Route::resource('permission', PermissionController::class)->names('permission');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



// Route::get('test', function(){
//     return view('backend.dashboard');
// });

Route::get('/', function () {
    return view('frontend/index');
});
Route::get('/about', function () {
    return view('frontend/about');
});
Route::get('/contact', function () {
    return view('frontend/contact');
});
Route::get('/blogs', function () {
    return view('frontend/blogs');
});
Route::get('/notice', function () {
    return view('frontend/notice');
});
Route::get('/report', function () {
    return view('frontend/report');
});
Route::get('/blog-single', function () {
    return view('frontend/blogsingle');
});
Route::get('/product', function () {
    return view('frontend/product');
});
Route::get('/vacancy', function () {
    return view('frontend/vacancy');
});
Route::get('/vacancy-result', function () {
    return view('frontend/vacancy_result');
});
Route::get('/member', function () {
    return view('frontend/member');
});
Route::get('/employee-quaterly', function () {
    return view('frontend/employee_quaterly');
});
Route::get('/job-detail', function () {
    return view('frontend/job_detail');
});
Route::get('/album', function () {
    return view('frontend.album');
});
Route::get('/gallery', function () {
    return view('frontend.gallery');
});
Route::get('/page', function () {
    return view('frontend.default_page');
});
