<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\RecruitmentResultRequest;
use App\Models\RecruitmentResult;


class RecruitmentResultController extends AdminBaseController
{
    protected string $viewPath = 'backend.recruitments.';
    protected string $requestClass = RecruitmentResultRequest::class;
    protected array $uploadFields = [];
    protected string $uploadPath = '';
    protected string $routePrefix = 'recruitment-results.index';


    public function __construct(RecruitmentResult $model)
    {
        $this->model = $model;
    }
}
