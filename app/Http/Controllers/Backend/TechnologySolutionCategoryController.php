<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\TechnologySolutionCategoryRequest;
use App\Models\TechnologySolutionCategory;

 

class TechnologySolutionCategoryController extends AdminBaseController
{
    protected string $viewPath = 'backend.technologySolutions.categories.';
    protected string $requestClass = TechnologySolutionCategoryRequest::class;
    protected array $uploadFields = [];
    protected string $uploadPath = 'technologySolutionsCategories';
    protected string $routePrefix = 'technology-solution-categories.index';
  

    public function __construct(TechnologySolutionCategory $model)
    {
        $this->model = $model;
    }
}