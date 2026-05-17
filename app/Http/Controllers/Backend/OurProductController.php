<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\OurProductRequest;
use App\Models\OurProduct;
use Illuminate\Contracts\View\View;

class OurProductController extends AdminBaseController
{
    protected string $viewPath = 'backend.ourProduct.';
    protected string $requestClass = OurProductRequest::class;
    protected array $uploadFields = ['image'];
    protected string $uploadPath = 'ourProduct';
    protected string $routePrefix = 'ourProduct.index';


    public function __construct(OurProduct $model)
    {
        $this->model = $model;
    }

    public function index(): View
    {
        $data = $this->model->first();
        return view($this->viewPath . 'form', compact('data'));
    }
}
