<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\CompanyGoalRequest;
use App\Models\CompanyGoal;

class CompanyGoalController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.sitesetting.';
    protected $requestClass = CompanyGoalRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'companyGoals';
    protected $routePrefix = 'siteSetting.index';


    public function __construct(CompanyGoal $model)
    {
        $this->model = $model;
    }

    

}
