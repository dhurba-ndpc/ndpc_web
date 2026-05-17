<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\VacancyRequest;
use App\Models\Vacancy;

class VacancyController extends AdminBaseController
{

    protected string $viewPath = 'backend.vacancy.';
    protected string $requestClass = VacancyRequest::class;
    protected array $uploadFields = [];
    protected string $uploadPath = '';
    protected string $routePrefix = 'vacancy.index';


    public function __construct(Vacancy $model)
    {
        $this->model = $model;
    }
}
