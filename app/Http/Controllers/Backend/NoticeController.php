<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\NoticeRequest;
use App\Models\Notice;
use Override;
use Illuminate\Contracts\View\View;


class NoticeController extends AdminBaseController
{

    protected string $viewPath = 'backend.notices.';
    protected string $requestClass = NoticeRequest::class;
    protected array $uploadFields = ['file'];
    protected string $uploadPath = 'notices';
    protected string $routePrefix = 'notices.index';


    public function __construct(Notice $model)
    {
        $this->model = $model;
    }

    #[Override]
    public function index(): View
    {
        $lists = $this->model->where('type', 'notices')->get();
        return view($this->viewPath . 'index', compact('lists'));
    }
}
