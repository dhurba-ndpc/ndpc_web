<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\SiteSettingRequest;
use App\Models\CompanyGoal;
use App\Models\FeatureAreas;
use App\Models\PromotionMessage;
use App\Models\SiteSetting;


class SiteSettingController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.sitesetting.';
    protected $requestClass = SiteSettingRequest::class;
    protected $uploadFields = ['logo_1', 'logo_2'];
    protected $uploadPath = 'siteSetting';
    protected $routePrefix = 'siteSetting.index';

    public function __construct(SiteSetting $model)
    {
        $this->model = $model;
    }


    public function index()
    {

        $promotionText = PromotionMessage::where('type', 'promotion_text')->first();
        $appLinkPromotion = PromotionMessage::where('type', 'app_link')->first();
        $data = $this->model->first();
        $darkBanner = FeatureAreas::where('type', 'dark_banner')->first();
        $companyGoal = CompanyGoal::first();

        return view($this->viewPath . 'form', compact('data', 'darkBanner', 'appLinkPromotion', 'promotionText', 'companyGoal'));
    }
}
