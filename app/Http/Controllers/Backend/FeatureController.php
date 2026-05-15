<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;

 
class FeatureController extends AdminBaseController
{
     protected $model;
    protected $viewPath = 'backend.features.';
    protected $requestClass = ServiceRequest::class;
    protected $uploadFields = [];
    protected $uploadPath = [];
    protected $routePrefix = 'features.index';


    public function __construct(Service $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $lists = $this->model
            ->where('type', 'features_offer')
            ->orderBy('id', 'desc')
            ->get();

        return view($this->viewPath . 'index', compact('lists'));
    }
}
