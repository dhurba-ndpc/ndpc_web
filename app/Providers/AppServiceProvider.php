<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Menu;
use App\Policies\PermissionPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // it is Maping multiple models to one policy spatie package
        $models = [
            Banner::class,
            About::class,

        ];

        foreach ($models as $model) {
            Gate::policy($model, PermissionPolicy::class);
        }

        // Menu passing data globally start
       
        $menus = Menu::query()
            ->whereNull('parent_id')  
            ->whereNotIn('menu_location', ['footer', 'useful_links'])   
            ->select('id', 'menu_name', 'parent_id', 'external_link', 'page_template', 'position', 'is_active', 'slug', 'menu_location')
            ->with([
                'children' => function ($query) {
                    $query
                        ->select('id', 'menu_name', 'parent_id', 'external_link', 'page_template', 'slug', 'is_active', 'menu_location')
                        ->whereNotIn('menu_location', ['footer', 'useful_links'])  
                        ->orderBy('position', 'ASC');
                }
            ])
            ->orderBy('position', 'ASC')
            ->get();

        View::share('menus', $menus);

        // $footermenus = Menu::query()
        //     ->whereNull('parent_id')   
        //     ->whereNotIn('header_footer', [1]) 
        //     ->select('id', 'menu_name', 'parent_id', 'external_link', 'category_slug', 'position', 'status', 'title_slug')
        //     ->with([
        //         'children' => function ($query) {
        //             $query
        //                 ->select('id', 'menu_name', 'parent_id', 'external_link', 'category_slug', 'title_slug', 'status')
        //                 ->whereNotIn('header_footer', [1])  
        //                 ->orderBy('position', 'ASC');
        //         }
        //     ])
        //     ->orderBy('position', 'ASC')
        //     ->get();

        // View::share('footermenus', $footermenus);
        // Menu passing data globally end
    }
}
