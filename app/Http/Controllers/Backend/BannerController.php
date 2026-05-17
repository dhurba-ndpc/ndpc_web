<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;

class BannerController extends AdminBaseController
{
    protected string $viewPath = 'backend.banner.';
    protected string $requestClass = BannerRequest::class;
    protected array $uploadFields = ['image'];
    protected string $uploadPath = 'banners';
    protected string $routePrefix = 'banner.index';
    // $uploadPath = strtolower(class_basename($this->model)) . 's';

    public function __construct(Banner $model)
    {
        $this->model = $model;
    }
}
