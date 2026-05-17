<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AlbumController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BoardDirectorController;
use App\Http\Controllers\Backend\CompanyGoalController;
use App\Http\Controllers\Backend\DarkBannerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeeQuarterController;
use App\Http\Controllers\Backend\FeatureController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\LeadingTeamController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\MvgController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\OurProductController;
use App\Http\Controllers\Backend\PromotionMessageController;
use App\Http\Controllers\Backend\RecruitmentResultController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\TechnologySolutionCategoryController;
use App\Http\Controllers\Backend\TechnologySolutionItemController;
use App\Http\Controllers\Backend\TechnologySolutionSectionController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\VacancyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PlayStoreController;

Route::prefix('admin')->middleware(['auth'])->group(function () {
    /*
     * |--------------------------------------------------------------------------
     * | Dashboard
     * |--------------------------------------------------------------------------
     */
    Route::resource('dashboard', DashboardController::class)->names('dashboard');

    /*
     * |--------------------------------------------------------------------------
     * | Website Content Management
     * |--------------------------------------------------------------------------
     */
    Route::resource('banner', BannerController::class)->names('banner');
    Route::resource('about', AboutController::class)->only(['index', 'store', 'update'])->names('about');
    Route::resource('mvg', MvgController::class)->names('mvg');
    Route::resource('darkbanner', DarkBannerController::class)->only(['index', 'store', 'update'])->names('darkbanner');
    Route::resource('company_goals', CompanyGoalController::class)->only(['index', 'store', 'update'])->names('company_goals');

    /*
     * |--------------------------------------------------------------------------
     * | Blog Management
     * |--------------------------------------------------------------------------
     */
    Route::resource('blog', BlogController::class)->names('blog');
    Route::resource('blogCategory', BlogCategoryController::class)->names('blogCategory');

    /*
     * |--------------------------------------------------------------------------
     * | Gallery Management
     * |--------------------------------------------------------------------------
     */
    Route::resource('albums', AlbumController::class)->names('albums');
    Route::resource('galleries', GalleryController::class)->names('galleries');

    /*
     * |--------------------------------------------------------------------------
     * | Team Management
     * |--------------------------------------------------------------------------
     */
    Route::resource('boardOfDirectors', BoardDirectorController::class)->names('boardOfDirectors');
    Route::resource('leadingTeams', LeadingTeamController::class)->names('leadingTeams');

    /*
     * |--------------------------------------------------------------------------
     * | Company / Product Sections
     * |--------------------------------------------------------------------------
     */
    Route::resource('testimonials', TestimonialController::class)->names('testimonials');
    Route::resource('employee-quarters', EmployeeQuarterController::class)->names('employee-quarters');
    Route::resource('ourProduct', OurProductController::class)->only(['index', 'store', 'update'])->names('ourProduct');
    Route::resource('promotion_message', PromotionMessageController::class)->names('promotion_message');

    /*
     * |--------------------------------------------------------------------------
     * | Technology Solutions
     * |--------------------------------------------------------------------------
     */
    Route::resource('technology-solution-sections', TechnologySolutionSectionController::class)->names('technology-solution-sections');
    Route::resource('technology-solution-categories', TechnologySolutionCategoryController::class)->names('technology-solution-categories');
    Route::resource('technology-solution-items', TechnologySolutionItemController::class)->names('technology-solution-items');

    /*
     * |--------------------------------------------------------------------------
     * | Services / Features
     * |--------------------------------------------------------------------------
     */
    Route::resource('services', ServiceController::class)->names('services');
    Route::resource('features', FeatureController::class)->names('features');

    /*
     * |--------------------------------------------------------------------------
     * | Notices / Reports / Vacancy
     * |--------------------------------------------------------------------------
     */
    Route::resource('notices', NoticeController::class)->names('notices');
    Route::resource('report', ReportController::class)->names('report');
    Route::resource('recruitment-results', RecruitmentResultController::class)->names('recruitment-results');
    Route::resource('vacancy', VacancyController::class)->names('vacancy');

    /*
     * |--------------------------------------------------------------------------
     * | Site Setting
     * |--------------------------------------------------------------------------
     */
    Route::resource('siteSetting', SiteSettingController::class)->names('siteSetting');
    Route::resource('playStore', PlayStoreController::class)->names('playStore');



    /*
     * |--------------------------------------------------------------------------
     * | Role Management
     * |--------------------------------------------------------------------------
     */
    Route::controller(RoleController::class)->prefix('roles')->name('roles.')->group(function () {
        Route::get('trash', 'trash')->name('trash');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
    });

    Route::resource('roles', RoleController::class)->names('roles');

    /*
     * |--------------------------------------------------------------------------
     * | User Management
     * |--------------------------------------------------------------------------
     */
    Route::controller(UserController::class)->group(function () {
        Route::get('view-profile', 'viewProfile')->name('viewProfile');

        Route::prefix('users')->name('users.')->group(function () {
            Route::get('trash', 'trash')->name('trash');
            Route::post('{id}/restore', 'restore')->name('restore');
            Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
        });
    });

    Route::resource('users', UserController::class)->names('users');

    /*
     * |--------------------------------------------------------------------------
     * | Menu Management
     * |--------------------------------------------------------------------------
     */
    Route::post('updateMenu', [MenuController::class, 'updateMenuOrder'])->name('updateMenuOrder');
    Route::resource('menu', MenuController::class)->names('menu');

    /*
     * |--------------------------------------------------------------------------
     * | Profile
     * |--------------------------------------------------------------------------
     */
    Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::patch('/', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });
});

require __DIR__ . '/auth.php';
require __DIR__.'/frontend.php';