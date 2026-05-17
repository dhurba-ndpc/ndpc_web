<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\TechnologySolutionItemRequest;
use App\Models\TechnologySolutionCategory;
use App\Models\TechnologySolutionItem;
use App\Models\TechnologySolutionSection;
use Override;
use Illuminate\Contracts\View\View;

class TechnologySolutionItemController extends AdminBaseController
{
    protected string $viewPath = 'backend.technologySolutions.solutionItems.';
    protected string $requestClass = TechnologySolutionItemRequest::class;
    protected array $uploadFields = ['image'];
    protected string $uploadPath = 'technologySolutionsItems';
    protected string $routePrefix = 'technology-solution-items.index';

    public function __construct(TechnologySolutionItem $model)
    {
        $this->model = $model;
    }

    #[Override]
    public function index(): View
    {
        $lists = $this->model->with('category')->orderBy('id', 'desc')->get();
        $section = TechnologySolutionSection::orderBy('id')->first();

        return view($this->viewPath . 'index', compact('lists', 'section'));
    }

    #[Override]
    public function create(): View
    {
        $categories = TechnologySolutionCategory::orderBy('id', 'desc')->get();
        return view($this->viewPath . 'form', compact('categories'));
    }
}
