<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Contracts\View\View;
 
class FeatureController extends AdminBaseController
{
    protected string $viewPath = 'backend.features.';
    protected string $requestClass = ServiceRequest::class;
    protected array $uploadFields = [];
    protected string $uploadPath = '';
    protected string $routePrefix = 'features.index';


    public function __construct(Service $model)
    {
        $this->model = $model;
    }

    public function index(): View
    {
        $lists = $this->model
            ->where('type', 'features_offer')
            ->orderBy('id', 'desc')
            ->get();

        return view($this->viewPath . 'index', compact('lists'));
    }
}
