<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;

 

class AlbumController extends AdminBaseController
{
    protected string $viewPath = 'backend.album.';
    protected string $requestClass = AlbumRequest::class;
    protected array $uploadFields = ['image'];
    protected string $uploadPath = 'albums';
    protected string $routePrefix = 'albums.index';


    public function __construct(Album $model)
    {
        $this->model = $model;
    }
}
