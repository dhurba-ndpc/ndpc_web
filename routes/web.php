<?php

use Illuminate\Support\Facades\Route;

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
