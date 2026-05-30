<?php

use App\Http\Controllers\Frontend\ContactMessageController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\JobApplicationController;
use Illuminate\Support\Facades\Route;
 
Route::get('/lang-switch/{lang}', function ($lang) {

    if (in_array($lang, ['en', 'ne'])) {
        session(['locale' => $lang]);
    }

    return response()->json(['success' => true]);

})->name('lang.switch');

Route::post('job-seeker-apply', [JobApplicationController::class, 'store'])
    ->name('job-seeker-apply.store')
    ->middleware('throttle:3,10');
Route::get('/', [FrontendController::class, 'index'])->name('index');

Route::get('notice-search', [FrontendController::class, 'search'])->name('notice.search');
Route::get('{pageTemplate}', [FrontendController::class, 'pageTemplate'])->name('pageTemplate');
Route::get('default-page/{slug}', [FrontendController::class, 'defaultPage'])->name('defaultPage');

Route::get('blog-single/{slug}', [FrontendController::class, 'singleBlog'])->name('blog-single');
Route::get('gallery/{slug}', [FrontendController::class, 'gallery'])->name('gallery');
Route::get('job-detail/{slug}', [FrontendController::class, 'jobDetail'])->name('job-detail');

Route::post('/contact-message', [ContactMessageController::class, 'store'])
    ->name('contact-message.store')
    ->middleware('throttle:3,10');
 
