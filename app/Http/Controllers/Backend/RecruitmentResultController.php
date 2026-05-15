<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\RecruitmentResultRequest;
use App\Models\RecruitmentResult;


class RecruitmentResultController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.recruitments.';
    protected $requestClass = RecruitmentResultRequest::class;
    protected $uploadFields = [];
    protected $uploadPath = [];
    protected $routePrefix = 'recruitment-results.index';


    public function __construct(RecruitmentResult $model)
    {
        $this->model = $model;
    }
}
