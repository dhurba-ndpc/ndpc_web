<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\BlogCategoryRequest;
use App\Models\BlogCategory;
 
 

class BlogCategoryController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.blog.category.';
    protected $requestClass = BlogCategoryRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'blogcategory';
    protected $routePrefix = 'blogCategory.index';
   

    public function __construct(BlogCategory $model)
    {
        $this->model = $model;
    }
}
