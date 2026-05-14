<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\OurProductRequest;
use App\Models\OurProduct;

 
class OurProductController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.ourProduct.';
    protected $requestClass = OurProductRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'ourProduct';
    protected $routePrefix = 'ourProduct.index';


    public function __construct(OurProduct $model)
    {
        $this->model = $model;
    }

     public function index()
    {
        $data = $this->model->first();
        return view($this->viewPath . 'form', compact('data'));
    }
    
}
