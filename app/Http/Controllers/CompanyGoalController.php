<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\CompanyGoalRequest;
use App\Models\CompanyGoal;

class CompanyGoalController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.companyGoals.';
    protected $requestClass = CompanyGoalRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'companyGoals';
    protected $routePrefix = 'company_goals.index';


    public function __construct(CompanyGoal $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $data = $this->model->first();
        return view($this->viewPath . 'form', compact('data'));
    }

}
