<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Contracts\View\View;

class AboutController extends AdminBaseController
{
    protected string $viewPath = 'backend.about.';
    protected string $requestClass = AboutRequest::class;
    protected array $uploadFields = ['image'];
    protected string $uploadPath = 'abouts';
    protected string $routePrefix = 'about.index';

    public function __construct(About $model)
    {
        $this->model = $model;
    }

    public function index(): View
    {
        $data = $this->model->first();

        return view($this->viewPath . 'form', compact('data'));
    }
}
