<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\DarkBannerRequest;
use App\Models\FeatureAreas;
use Illuminate\Contracts\View\View;

class DarkBannerController extends AdminBaseController
{
    protected string $viewPath = 'backend.sitesetting.';
    protected string $requestClass = DarkBannerRequest::class;
    protected array $uploadFields = ['image'];
    protected string $uploadPath = 'darkbanner';
    protected string $routePrefix = 'siteSetting.index';
 

    public function __construct(FeatureAreas $model)
    {
        $this->model = $model;
    }

    public function index(): View
    {
        $data = $this->model->where('type', 'dark_banner')->first();
        return view($this->viewPath . 'form', compact('data'));
    }
}
