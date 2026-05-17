<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\MvgRequest;
use App\Models\FeatureAreas;
 
 

class MvgController extends AdminBaseController
{
    protected string $viewPath = 'backend.mvg.';
    protected string $requestClass = MvgRequest::class;
    protected array $uploadFields = ['image'];
    protected string $uploadPath = 'mvg';
    protected string $routePrefix = 'mvg.index';

    public function __construct(FeatureAreas $model)
    {
        $this->model = $model;
    }

}
