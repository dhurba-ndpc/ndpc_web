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
use App\Http\Controllers\Backend\PlayStoreController;
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

Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::resource('dashboard', DashboardController::class)
        ->names('dashboard');

    Route::resource('banner', BannerController::class)
        ->middleware('permission:Banner-View')
        ->names('banner');

    Route::resource('about', AboutController::class)
        ->only(['index', 'store', 'update'])
        ->middleware('permission:About-View')
        ->names('about');

    Route::resource('mvg', MvgController::class)
        ->middleware('permission:Mvg-View')
        ->names('mvg');

    Route::resource('darkbanner', DarkBannerController::class)
        ->only(['index', 'store', 'update'])
        ->middleware('permission:DarkBanner-View')
        ->names('darkbanner');

    Route::resource('company_goals', CompanyGoalController::class)
        ->only(['index', 'store', 'update'])
        ->middleware('permission:CompanyGoal-View')
        ->names('company_goals');

    Route::resource('blog', BlogController::class)
        ->middleware('permission:Blog-View')
        ->names('blog');

    Route::resource('blogCategory', BlogCategoryController::class)
        ->middleware('permission:BlogCategory-View')
        ->names('blogCategory');

    Route::resource('albums', AlbumController::class)
        ->middleware('permission:Album-View')
        ->names('albums');

    Route::resource('galleries', GalleryController::class)
        ->middleware('permission:Gallery-View')
        ->names('galleries');

    Route::resource('boardOfDirectors', BoardDirectorController::class)
        ->middleware('permission:BoardOfDirectors-View')
        ->names('boardOfDirectors');

    Route::resource('leadingTeams', LeadingTeamController::class)
        ->middleware('permission:LeadingTeam-View')
        ->names('leadingTeams');

    Route::resource('testimonials', TestimonialController::class)
        ->middleware('permission:Testimonial-View')
        ->names('testimonials');

    Route::resource('employee-quarters', EmployeeQuarterController::class)
        ->middleware('permission:EmployeeQuarter-View')
        ->names('employee-quarters');

    Route::resource('ourProduct', OurProductController::class)
        ->only(['index', 'store', 'update'])
        ->middleware('permission:OurProduct-View')
        ->names('ourProduct');

    Route::resource('promotion_message', PromotionMessageController::class)
        ->middleware('permission:PromotionMessage-View')
        ->names('promotion_message');

    Route::resource('technology-solution-sections', TechnologySolutionSectionController::class)
        ->middleware('permission:TechnologySolutionSection-View')
        ->names('technology-solution-sections');

    Route::resource('technology-solution-categories', TechnologySolutionCategoryController::class)
        ->middleware('permission:TechnologySolutionCategory-View')
        ->names('technology-solution-categories');

    Route::resource('technology-solution-items', TechnologySolutionItemController::class)
        ->middleware('permission:TechnologySolutionItem-View')
        ->names('technology-solution-items');

    Route::resource('services', ServiceController::class)
        ->middleware('permission:Service-View')
        ->names('services');

    Route::resource('features', FeatureController::class)
        ->middleware('permission:Feature-View')
        ->names('features');

    Route::resource('notices', NoticeController::class)
        ->middleware('permission:Notice-View')
        ->names('notices');

    Route::resource('report', ReportController::class)
        ->middleware('permission:Report-View')
        ->names('report');

    Route::resource('recruitment-results', RecruitmentResultController::class)
        ->middleware('permission:RecruitmentResult-View')
        ->names('recruitment-results');

    Route::resource('vacancy', VacancyController::class)
        ->middleware('permission:Vacancy-View')
        ->names('vacancy');

    Route::resource('siteSetting', SiteSettingController::class)
        ->middleware('permission:SiteSetting-View')
        ->names('siteSetting');

    Route::resource('playStore', PlayStoreController::class)
        ->middleware('permission:PlayStore-View')
        ->names('playStore');

    Route::controller(RoleController::class)
        ->prefix('roles')
        ->name('roles.')
        ->middleware('permission:Role-View')
        ->group(function () {
            Route::get('trash', 'trash')->name('trash');
            Route::post('{id}/restore', 'restore')->name('restore');
            Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
        });

    Route::resource('roles', RoleController::class)
        ->middleware('permission:Role-View')
        ->names('roles');

    Route::controller(UserController::class)->group(function () {

        Route::get('view-profile', 'viewProfile')
            ->name('viewProfile');

        Route::patch('view-profile/update', 'updateProfile')
            ->name('updateProfile');

        Route::prefix('users')
            ->name('users.')
            ->middleware('permission:User-View')
            ->group(function () {
                Route::get('trash', 'trash')->name('trash');
                Route::post('{id}/restore', 'restore')->name('restore');
                Route::delete('{id}/force-delete', 'forceDelete')->name('forceDelete');
            });
    });

    Route::resource('users', UserController::class)
        ->middleware('permission:User-View')
        ->names('users');

    Route::resource('users', UserController::class)
        ->middleware('permission:User-View')
        ->names('users');

    Route::post('updateMenu', [MenuController::class, 'updateMenuOrder'])
        ->middleware('permission:Menu-Edit')
        ->name('updateMenuOrder');

    Route::resource('menu', MenuController::class)
        ->middleware('permission:Menu-View')
        ->names('menu');

    Route::controller(ProfileController::class)
        ->prefix('profile')
        ->name('profile.')
        ->group(function () {
            Route::get('/', 'edit')->name('edit');
            Route::patch('/', 'update')->name('update');
            Route::delete('/', 'destroy')->name('destroy');
        });
});

require __DIR__ . '/auth.php';
require __DIR__ . '/frontend.php';
