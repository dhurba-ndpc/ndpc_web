<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\BlogCategoryRequest;
use App\Models\BlogCategory;
 
 

class BlogCategoryController extends AdminBaseController
{
    protected string $viewPath = 'backend.blog.category.';
    protected string $requestClass = BlogCategoryRequest::class;
    protected array $uploadFields = ['image'];
    protected string $uploadPath = 'blogcategory';
    protected string $routePrefix = 'blogCategory.index';
   

    public function __construct(BlogCategory $model)
    {
        $this->model = $model;
    }
}
