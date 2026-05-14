<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\TechnologySolutionSectionRequest;
use App\Models\TechnologySolutionSection;
use Illuminate\Http\Request;

 

class TechnologySolutionSectionController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.technologySolutions.solutionItems.';
    protected $requestClass = TechnologySolutionSectionRequest::class;
    protected $uploadFields = [];
    protected $uploadPath = '';
    protected $routePrefix = 'technology-solution-items.index';
     

    public function __construct(TechnologySolutionSection $model)
    {
        $this->model = $model;
    }

    public function store(Request $request)
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
