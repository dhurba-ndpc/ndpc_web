<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\DarkBannerRequest;
use App\Models\FeatureAreas;



class DarkBannerController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.sitesetting.';
    protected $requestClass = DarkBannerRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'darkbanner';
    protected $routePrefix = 'siteSetting.index';
    // $uploadPath = strtolower(class_basename($this->model)) . 's';

    public function __construct(FeatureAreas $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $data = $this->model->where('type', 'dark_banner')->first();
        return view($this->viewPath . 'form', compact('data'));
    }
}
