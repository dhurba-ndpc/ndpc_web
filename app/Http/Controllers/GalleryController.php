<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\GalleryRequest;
use App\Models\Album;
use App\Models\Gallery;



class GalleryController extends AdminBaseController
{

    protected $model;
    protected $viewPath = 'backend.gallery.';
    protected $requestClass = GalleryRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'gallery';
    protected $routePrefix = 'galleries.index';


    public function __construct(Gallery $model)
    {
        $this->model = $model;
    }


    public function create()
    {
        $albums = Album::orderBy('id', 'desc')->get();
        return view($this->viewPath . 'form', compact('albums'));
    }

    public function edit(string $id)
    {
        $albums = Album::orderBy('id', 'desc')->get();
        $data = $this->model->findOrFail($id);
        return view($this->viewPath . 'form', compact('data', 'albums'));
    }
}
