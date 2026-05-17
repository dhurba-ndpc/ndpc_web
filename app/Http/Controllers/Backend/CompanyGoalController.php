<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CompanyGoalRequest;
use App\Models\CompanyGoal;

class CompanyGoalController extends AdminBaseController
{
    protected string $viewPath = 'backend.sitesetting.';
    protected string $requestClass = CompanyGoalRequest::class;
    protected array $uploadFields = ['image'];
    protected string $uploadPath = 'companyGoals';
    protected string $routePrefix = 'siteSetting.index';


    public function __construct(CompanyGoal $model)
    {
        $this->model = $model;
    }

    

}
