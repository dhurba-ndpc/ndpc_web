<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\NoticeRequest;
use App\Models\Notice;
use Override;
use Illuminate\Contracts\View\View;

class ReportController extends AdminBaseController
{
    protected string $viewPath = 'backend.report.';
    protected string $requestClass = NoticeRequest::class;
    protected array $uploadFields = ['file'];
    protected string $uploadPath = 'report';
    protected string $routePrefix = 'report.index';


    public function __construct(Notice $model)
    {
        $this->model = $model;
    }

    #[Override]
    public function index(): View
    {
        $lists = $this->model->where('type', 'report')->get();
        return view($this->viewPath . 'index', compact('lists'));
    }
}
