<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Album;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\CompanyGoal;
use App\Models\EmployeeQuarter;
use App\Models\FeatureAreas;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\Notice;
use App\Models\OurProduct;
use App\Models\PromotionMessage;
use App\Models\RecruitmentResult;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\TechnologySolutionCategory;
use App\Models\TechnologySolutionSection;
use App\Models\Testimonial;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    // waiting for develop

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
                $employee_quaters = EmployeeQuarter::where('is_active', true)
                    ->orderBy('year', 'desc')
                    ->orderBy('quarter', 'desc')
                    ->get()
                    ->values();

                $currentData = $employee_quaters->first();

                $currentIndex = $employee_quaters->search(function ($item) use ($currentData) {
                    return (int) $item->year === (int) $currentData->year &&
                        (int) $item->quarter === (int) $currentData->quarter;
                });

                if ($currentIndex !== false) {
                    $employee_quaters = $employee_quaters
                        ->slice($currentIndex - 1)
                        ->concat($employee_quaters->slice(0, $currentIndex - 1))
                        ->values();
                }

                return view('frontend.employee_quaterly', compact(
                    'menu',
                    'employee_quaters'
                ));

            case 'our-product':
                $menu = $menus;
                $product = OurProduct::where('is_active', true)->first();
                $section_title = TechnologySolutionSection::where('is_active', true)->first();
                $tech_detail = TechnologySolutionCategory::with([
                    'items' => function ($query) {
                        $query->where('is_active', true);
                    }
                ])
                    ->where('is_active', true)
                    ->whereHas('items', function ($query) {
                        $query->where('is_active', true);
                    })
                    ->orderBy('position', 'desc')
                    ->get();
                $services = Service::where(['type' => 'services_offer', 'is_active' => true])->orderBy('position', 'asc')->take(6)->get();
                $features = Service::where(['type' => 'features_offer', 'is_active' => true])->orderBy('position', 'asc')->take(4)->get();
                $promotion_text = PromotionMessage::where(['type' => 'promotion_text', 'is_active' => true])->first();

                return view('frontend.product', compact(
                    'menu',
                    'product',
                    'section_title',
                    'tech_detail',
                    'services',
                    'features',
                    'promotion_text'
                ));

            case 'press-release':
                $menu = $menus;
                $notices = $this->getNoticeData(request('search'));
                return view('frontend.notice', compact(
                    'menu',
                    'notices'
                ));

            case 'reports':
                $menu = $menus;
                $reports = Notice::where(['type' => 'report', 'is_active' => true])->orderBy('id', 'desc')->paginate(4);
                return view('frontend.report', compact(
                    'menu',
                    'reports'
                ));

            case 'album':
                $menu = $menus;
                $album_detail = Album::with([
                    'galleries' => function ($query) {
                        $query->where('is_active', true);
                    }
                ])
                    ->where('is_active', true)
                    ->whereHas('galleries', function ($query) {
                        $query->where('is_active', true);
                    })
                    ->orderBy('id', 'desc')
                    ->get();

                return view('frontend.album', compact(
                    'album_detail',
                    'menu'
                ));

            case 'vacancy-result':
                $recruitmentResult = RecruitmentResult::where('is_active', true)->get();
                return view('frontend.vacancy_result', compact(
                    'recruitmentResult'
                ));

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



    private function getNoticeData($search = null)
    {
        $search = trim((string) $search);

        return Notice::where([
            'type' => 'notices',
            'is_active' => true
        ])
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title_en', 'LIKE', "%{$search}%")
                        ->orWhere('title_ne', 'LIKE', "%{$search}%")
                        ->orWhere('badge_title_en', 'LIKE', "%{$search}%")
                        ->orWhere('badge_title_ne', 'LIKE', "%{$search}%");
                });
            })
            ->orderBy('id', 'desc')
            ->get();
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $notices = $this->getNoticeData($search);

        return view('frontend.partials.notice-list', compact('notices'))->render();
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


    public function gallery($slug)
    {
        $menu = Menu::where('page_template', 'album')->first();

        $album_name = Album::where('slug', $slug)->first();
        $get_album_gallery = Album::with(['galleries' => function ($q) {
            $q->where('is_active', true);
        }])->where(['slug' => $slug, 'is_active' => true])->firstOrFail();
        return view('frontend.gallery', compact(
            'album_name',
            'get_album_gallery',
            'menu'
        ));
    }
}
