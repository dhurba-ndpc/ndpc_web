<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\EmployeeQuarterRequest;
use App\Models\EmployeeQuarter;

 
class EmployeeQuarterController extends AdminBaseController
{
     protected $model;
    protected $viewPath = 'backend.employeeQuarters.';
    protected $requestClass = EmployeeQuarterRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'employeeQuarters';
    protected $routePrefix = 'employee-quarters.index';


    public function __construct(EmployeeQuarter $model)
    {
        $this->model = $model;
    }
}
