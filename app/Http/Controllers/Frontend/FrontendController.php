<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\FeatureAreas;
use App\Models\Gallery;
use App\Models\PromotionMessage;

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
        switch ($slug) {
            case 'home':
                return redirect()->route('index');

            case 'about':
                return view('frontend.about');

            case 'board-of-director':
                return view('frontend.member');

            case 'employee-quarterly':
                return view('frontend.employee_quaterly');

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
