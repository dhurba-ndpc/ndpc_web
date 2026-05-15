<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
 

class ServiceController extends AdminBaseController
{

    protected $model;
    protected $viewPath = 'backend.services.';
    protected $requestClass = ServiceRequest::class;
    protected $uploadFields = [];
    protected $uploadPath = [];
    protected $routePrefix = 'services.index';


    public function __construct(Service $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $lists = $this->model
            ->where('type', 'services_offer')
            ->orderBy('id', 'desc')
            ->get();

        return view($this->viewPath . 'index', compact('lists'));
    }
}
