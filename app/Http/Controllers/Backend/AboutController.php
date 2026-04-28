<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\AboutRequest;
use App\Models\About;

class AboutController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.about.';
    protected $requestClass = AboutRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'abouts';
    protected $routePrefix = 'about.index';

    public function __construct(About $model)
    {
        $this->model = $model;
    }

    
    public function index()
    {
        $data = About::first();
        return view($this->viewPath . 'form', compact('data'));
    }
}
