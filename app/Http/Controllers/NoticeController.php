<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\NoticeRequest;
use App\Models\Notice;



class NoticeController extends AdminBaseController
{

    protected $model;
    protected $viewPath = 'backend.notices.';
    protected $requestClass = NoticeRequest::class;
    protected $uploadFields = ['file'];
    protected $uploadPath = 'notices';
    protected $routePrefix = 'notices.index';


    public function __construct(Notice $model)
    {
        $this->model = $model;
    }

    #[Override]
    public function index()
    {
        $lists = $this->model->where('type', 'notices')->get();
        return view($this->viewPath . 'index', compact('lists'));
    }
}
