<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;

class BlogController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.blog.';
    protected $requestClass = BlogRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'blog';
    protected $routePrefix = 'blog.index';


    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    public function create()
    {
        $categories = BlogCategory::orderBy('id', 'desc')->get();
        return view($this->viewPath . 'form', compact('categories'));
    }


    public function edit(string $id)
    {
        $categories = BlogCategory::orderBy('id', 'desc')->get();
        $data = $this->model->findOrFail($id);
        return view($this->viewPath . 'form', compact('data', 'categories'));
    }
}
