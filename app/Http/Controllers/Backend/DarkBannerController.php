<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\DarkBannerRequest;
use App\Models\DarkBanner;



class DarkBannerController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.darkbanner.';
    protected $requestClass = DarkBannerRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'darkbanner';
    protected $routePrefix = 'darkbanner.index';
    // $uploadPath = strtolower(class_basename($this->model)) . 's';

    public function __construct(DarkBanner $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $data = $this->model->first();
        return view($this->viewPath . 'form', compact('data'));
    }
}
