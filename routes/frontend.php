<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;
 
Route::get('/lang-switch/{lang}', function ($lang) {

    if (in_array($lang, ['en', 'ne'])) {
        session(['locale' => $lang]);
    }

    return response()->json(['success' => true]);

})->name('lang.switch');


Route::get('/', [FrontendController::class, 'index'])->name('index');

Route::get('{pageTemplate}', [FrontendController::class, 'pageTemplate'])->name('pageTemplate');
Route::get('default-page/{slug}', [FrontendController::class, 'defaultPage'])->name('defaultPage');

Route::get('blog-single/{slug}', [FrontendController::class, 'singleBlog'])->name('blog-single');









// Route::get('/about', function () {
//     return view('frontend/about');
// });
// Route::get('/contact', function () {
//     return view('frontend/contact');
// });
// Route::get('/blogs', function () {
//     return view('frontend/blogs');
// });
// Route::get('/notice', function () {
//     return view('frontend/notice');
// });
// Route::get('/report', function () {
//     return view('frontend/report');
// });
// Route::get('/blog-single', function () {
//     return view('frontend/blogsingle');
// });
// Route::get('/product', function () {
//     return view('frontend/product');
// });
// Route::get('/vacancy', function () {
//     return view('frontend/vacancy');
// });
// Route::get('/vacancy-result', function () {
//     return view('frontend/vacancy_result');
// });
// Route::get('/member', function () {
//     return view('frontend/member');
// });
// Route::get('/employee-quaterly', function () {
//     return view('frontend/employee_quaterly');
// });
// Route::get('/job-detail', function () {
//     return view('frontend/job_detail');
// });
// Route::get('/album', function () {
//     return view('frontend.album');
// });
// Route::get('/gallery', function () {
//     return view('frontend.gallery');
// });
// Route::get('/page', function () {
//     return view('frontend.default_page');
// });
