<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\TechnologySolutionItemRequest;
use App\Models\TechnologySolutionCategory;
use App\Models\TechnologySolutionItem;
use App\Models\TechnologySolutionSection;
use Override;

class TechnologySolutionItemController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.technologySolutions.solutionItems.';
    protected $requestClass = TechnologySolutionItemRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'technologySolutionsItems';
    protected $routePrefix = 'technology-solution-items.index';

    public function __construct(TechnologySolutionItem $model)
    {
        $this->model = $model;
    }

    #[Override]
    public function index()
    {
        $lists = $this->model->with('category')->orderBy('id', 'desc')->get();
        $section = TechnologySolutionSection::orderBy('id')->first();

        return view($this->viewPath . 'index', compact('lists', 'section'));
    }

    #[Override]
    public function create()
    {
        $categories = TechnologySolutionCategory::orderBy('id', 'desc')->get();
        return view($this->viewPath . 'form', compact('categories'));
    }
}
