<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\VacancyRequest;
use App\Models\Vacancy;

class VacancyController extends AdminBaseController
{

    protected $model;
    protected $viewPath = 'backend.vacancy.';
    protected $requestClass = VacancyRequest::class;
    protected $uploadFields = [];
    protected $uploadPath = [];
    protected $routePrefix = 'vacancy.index';


    public function __construct(Vacancy $model)
    {
        $this->model = $model;
    }
}
