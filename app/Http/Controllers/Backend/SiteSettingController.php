<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\SiteSettingRequest;
use App\Models\FeatureAreas;
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
        $data = $this->model->first();
        $darkBanner = FeatureAreas::where('type', 'dark_banner')->first();

        return view($this->viewPath . 'form', compact('data', 'darkBanner'));
    }
}
