<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
 

class TestimonialController extends AdminBaseController
{
     
    protected string $viewPath = 'backend.testimonials.';
    protected string $requestClass = TestimonialRequest::class;
    protected array $uploadFields = ['image'];
    protected string $uploadPath = 'testimonials';
    protected string $routePrefix = 'testimonials.index';


    public function __construct(Testimonial $model)
    {
        $this->model = $model;
    }
}
