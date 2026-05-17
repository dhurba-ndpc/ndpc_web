<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\PromotionMessageRequest;
use App\Models\PromotionMessage;



class PromotionMessageController extends AdminBaseController
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
}
