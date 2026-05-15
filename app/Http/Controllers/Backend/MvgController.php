<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\MvgRequest;
use App\Models\FeatureAreas;
 
 

class MvgController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.mvg.';
    protected $requestClass = MvgRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'mvg';
    protected $routePrefix = 'mvg.index';

    public function __construct(FeatureAreas $model)
    {
        $this->model = $model;
    }

}
