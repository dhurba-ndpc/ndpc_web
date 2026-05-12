<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\AlbumRequest;
use App\Models\Album;

 

class AlbumController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.album.';
    protected $requestClass = AlbumRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'albums';
    protected $routePrefix = 'albums.index';


    public function __construct(Album $model)
    {
        $this->model = $model;
    }
}
