<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\TechnologySolutionCategoryRequest;
use App\Models\TechnologySolutionCategory;

 

class TechnologySolutionCategoryController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.technologySolutions.categories.';
    protected $requestClass = TechnologySolutionCategoryRequest::class;
    protected $uploadFields = [];
    protected $uploadPath = 'technologySolutionsCategories';
    protected $routePrefix = 'technology-solution-categories.index';
  

    public function __construct(TechnologySolutionCategory $model)
    {
        $this->model = $model;
    }
}