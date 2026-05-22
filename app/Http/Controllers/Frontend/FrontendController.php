<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\CompanyGoal;
use App\Models\EmployeeQuarter;
use App\Models\FeatureAreas;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\PromotionMessage;
use App\Models\TeamMember;
use App\Models\Testimonial;

class FrontendController extends Controller
{
    //waiting for develop

    public function index()
    {

        $banners = Banner::orderby('id', 'desc')->where('is_active', true)->get();
        $about = About::where('is_active', true)->first();
        $missionVission = FeatureAreas::where(['type' => 'mvg', 'is_active' => '1'])->orderBy('position', 'asc')->take(3)->get();
        $darkBanner = FeatureAreas::where(['type' => 'dark_banner', 'is_active' => 1])->first();
        $blogs = Blog::with('categories')->where('is_active', true)->orderBy('id', 'desc')->take(6)->get();
        $mileStone = Gallery::orderBy('id', 'desc')->where('is_active', true)->get();
        $app_link = PromotionMessage::where(['type' => 'app_link', 'is_active' => true])->first();
        return view('frontend.index', compact(
            'banners',
            'about',
            'missionVission',
            'darkBanner',
            'blogs',
            'mileStone',
            'app_link'
        ));
    }


    public function defaultPage($slug)
    {
        return view('frontend.default_page');
    }



    public function pageTemplate($slug)
    {
        $menus = Menu::where('page_template', $slug)->first();
        switch ($slug) {
            case 'home':
                return redirect()->route('index');

            case 'about':
                $menu = $menus;
                $about = About::where('is_active', true)->first();
                $leadingTeam = TeamMember::where(['type' => 'leading_team', 'is_active' => true])->orderBy('sort_order', 'asc')->take(4)->get();
                $missionVission = FeatureAreas::where(['type' => 'mvg', 'is_active' => '1'])->orderBy('position', 'asc')->take(3)->get();
                $companyGoal = CompanyGoal::where(['is_active' => 1])->first();
                $testimonials = Testimonial::where('is_active', true)->orderBy('id', 'desc')->get();
                return view('frontend.about', compact(
                    'about',
                    'menu',
                    'leadingTeam',
                    'missionVission',
                    'companyGoal',
                    'testimonials'
                ));

            case 'board-of-director':
                $menu = $menus;
                $board_director = TeamMember::where(['type' => 'board_of_directors', 'is_active' => true])->orderBy('sort_order', 'asc')->take(4)->get();
                return view('frontend.member', compact(
                    'menu',
                    'board_director'
                ));

            case 'employee-quarterly':
                $menu = $menus;
                $employee_quaters = EmployeeQuarter::where('is_active', true)->get();
                return view('frontend.employee_quaterly', compact(
                    'menu',
                    'employee_quaters'
                ));

            case 'our-product':
                return view('frontend.product');

            case 'press-release':
                return view('frontend.notice');

            case 'reports':
                return view('frontend.report');

            case 'album':
                return view('frontend.album');

            case 'vacancy-result':
                return view('frontend.vacancy_result');

            case 'open-vacancy-position':
                return view('frontend.vacancy');

            case 'blogs':
                return view('frontend.blogs');

            case 'contact':
                return view('frontend.contact');

            default:
                abort(404);
        }
    }

    public function singleBlog($slug)
    {
        $blog = Blog::with('categories', 'user')
            ->where('slug', $slug)
            ->firstOrFail();
        $recentBlog = Blog::orderBy('id', 'desc')->take(3)->get();

        return view('frontend.blogsingle', compact(
            'blog',
            'recentBlog'
        ));
    }
}
