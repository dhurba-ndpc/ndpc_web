<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\GalleryRequest;
use App\Models\Album;
use App\Models\Gallery;
use Illuminate\Contracts\View\View;


class GalleryController extends AdminBaseController
{

    protected string $viewPath = 'backend.gallery.';
    protected string $requestClass = GalleryRequest::class;
    protected array $uploadFields = ['image'];
    protected string $uploadPath = 'gallery';
    protected string $routePrefix = 'galleries.index';


    public function __construct(Gallery $model)
    {
        $this->model = $model;
    }


    public function create(): View
    {
        $albums = Album::orderBy('id', 'desc')->get();
        return view($this->viewPath . 'form', compact('albums'));
    }

    public function edit(string $id): View
    {
        $albums = Album::orderBy('id', 'desc')->get();
        $data = $this->model->findOrFail($id);
        return view($this->viewPath . 'form', compact('data', 'albums'));
    }
}
