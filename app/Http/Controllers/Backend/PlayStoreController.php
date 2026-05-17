<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\PromotionMessageRequest;
use App\Models\PromotionMessage;
use Illuminate\Contracts\View\View;

class PlayStoreController extends AdminBaseController
{
    protected string $viewPath = 'backend.sitesetting.';
    protected string $requestClass = PromotionMessageRequest::class;
    protected array $uploadFields = [];
    protected string $uploadPath = '';
    protected string $routePrefix = 'siteSetting.index';

    public function __construct(PromotionMessage $model)
    {
        $this->model = $model;
    }

    public function index(): View
    {
        $data = $this->model->where('type', 'app_link')->first();
        return view($this->viewPath . 'form', compact('data'));
    }
}
