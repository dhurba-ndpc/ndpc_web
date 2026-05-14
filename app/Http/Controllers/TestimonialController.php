<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
 

class TestimonialController extends AdminBaseController
{
     
    protected $model;
    protected $viewPath = 'backend.testimonials.';
    protected $requestClass = TestimonialRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'testimonials';
    protected $routePrefix = 'testimonials.index';


    public function __construct(Testimonial $model)
    {
        $this->model = $model;
    }
}
