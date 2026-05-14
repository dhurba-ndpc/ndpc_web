<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\TeamMemberRequest;
use App\Models\TeamMember;

class BoardDirectorController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.teamMember.boardOfDirectors.';
    protected $requestClass = TeamMemberRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'boardOfDirectors';
    protected $routePrefix = 'boardOfDirectors.index';


    public function __construct(TeamMember $model)
    {
        $this->model = $model;
    }
}
