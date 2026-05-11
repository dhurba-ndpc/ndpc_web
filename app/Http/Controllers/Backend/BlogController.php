<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;

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
}
