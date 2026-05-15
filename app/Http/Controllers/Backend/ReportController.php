<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\NoticeRequest;
use App\Models\Notice;
use Override;

class ReportController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.report.';
    protected $requestClass = NoticeRequest::class;
    protected $uploadFields = ['file'];
    protected $uploadPath = 'report';
    protected $routePrefix = 'report.index';


    public function __construct(Notice $model)
    {
        $this->model = $model;
    }

    #[Override]
    public function index()
    {
        $lists = $this->model->where('type', 'report')->get();
        return view($this->viewPath . 'index', compact('lists'));
    }
}
