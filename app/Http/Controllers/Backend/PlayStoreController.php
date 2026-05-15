<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\PromotionMessageRequest;
use App\Models\PromotionMessage;

 

class PlayStoreController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.sitesetting.';
    protected $requestClass = PromotionMessageRequest::class;
    protected $uploadFields = [];
    protected $uploadPath = [];
    protected $routePrefix = 'siteSetting.index';

    public function __construct(PromotionMessage $model)
    {
        $this->model = $model;
    }
}
