<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Contracts\View\View;

class BlogController extends AdminBaseController
{
    protected string $viewPath = 'backend.blog.';
    protected string $requestClass = BlogRequest::class;
    protected array $uploadFields = ['image'];
    protected string $uploadPath = 'blog';
    protected string $routePrefix = 'blog.index';
    protected bool $assignAuthenticatedUser = true;

    protected array $syncRelations = [
        'categories' => 'blog_category_id',
    ];

    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    public function create(): View
    {
        $categories = BlogCategory::orderBy('id', 'desc')->get();
        return view($this->viewPath . 'form', compact('categories'));
    }

    public function edit(string $id): View
    {
        $categories = BlogCategory::orderBy('id', 'desc')->get();
        $data = $this->model->findOrFail($id);
        return view($this->viewPath . 'form', compact('data', 'categories'));
    }
}
