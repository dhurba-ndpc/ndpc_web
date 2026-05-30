<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\SiteSettingRequest;
use App\Models\CompanyGoal;
use App\Models\FeatureAreas;
use App\Models\PromotionMessage;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;

class SiteSettingController extends AdminBaseController
{
    protected string $viewPath = 'backend.sitesetting.';
    protected string $requestClass = SiteSettingRequest::class;
    protected array $uploadFields = ['logo_1', 'logo_2', 'image'];
    protected string $uploadPath = 'siteSetting';
    protected string $routePrefix = 'siteSetting.index';

    public function __construct(SiteSetting $model)
    {
        $this->model = $model;
    }


    public function index(): View
    {

        $promotionText = PromotionMessage::where('type', 'promotion_text')->first();
        $appLinkPromotion = PromotionMessage::where('type', 'app_link')->first();
        $data = $this->model->first();
        $darkBanner = FeatureAreas::where('type', 'dark_banner')->first();
        $companyGoal = CompanyGoal::first();

        return view($this->viewPath . 'form', compact('data', 'darkBanner', 'appLinkPromotion', 'promotionText', 'companyGoal'));
    }
}
