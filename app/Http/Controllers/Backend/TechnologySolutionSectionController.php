<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\TechnologySolutionSectionRequest;
use App\Models\TechnologySolutionSection;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TechnologySolutionSectionController extends AdminBaseController
{
    protected string $viewPath = 'backend.technologySolutions.solutionItems.';
    protected string $requestClass = TechnologySolutionSectionRequest::class;
    protected array $uploadFields = [];
    protected string $uploadPath = '';
    protected string $routePrefix = 'technology-solution-items.index';

    public function __construct(TechnologySolutionSection $model)
    {
        $this->model = $model;
    }

    public function store(Request $request): RedirectResponse
    {
        $request = app(TechnologySolutionSectionRequest::class);
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active');

        $section = $this->model->orderBy('id')->first();

        if ($section) {
            $section->update($data);
        } else {
            $this->model->create($data);
        }

        return redirect()
            ->route($this->routePrefix)
            ->with('success', 'Technology Solution Section saved successfully');
    }
}
