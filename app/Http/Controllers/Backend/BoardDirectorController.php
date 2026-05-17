<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\TeamMemberRequest;
use App\Models\TeamMember;

class BoardDirectorController extends AdminBaseController
{
    protected string $viewPath = 'backend.teamMember.boardOfDirectors.';
    protected string $requestClass = TeamMemberRequest::class;
    protected array $uploadFields = ['image'];
    protected string $uploadPath = 'boardOfDirectors';
    protected string $routePrefix = 'boardOfDirectors.index';


    public function __construct(TeamMember $model)
    {
        $this->model = $model;
    }
}
