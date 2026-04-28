<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;

class BannerController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.banner.';
    protected $requestClass = BannerRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'banners';
    protected $routePrefix = 'banner.index';
    // $uploadPath = strtolower(class_basename($this->model)) . 's';

    public function __construct(Banner $model)
    {
        $this->model = $model;
    }
}
