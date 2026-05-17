<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\EmployeeQuarterRequest;
use App\Models\EmployeeQuarter;

 
class EmployeeQuarterController extends AdminBaseController
{
    protected string $viewPath = 'backend.employeeQuarters.';
    protected string $requestClass = EmployeeQuarterRequest::class;
    protected array $uploadFields = ['image'];
    protected string $uploadPath = 'employeeQuarters';
    protected string $routePrefix = 'employee-quarters.index';


    public function __construct(EmployeeQuarter $model)
    {
        $this->model = $model;
    }
}
