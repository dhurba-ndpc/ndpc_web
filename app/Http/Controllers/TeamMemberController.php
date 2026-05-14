<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\TeamMemberRequest;
use App\Models\TeamMember;


class TeamMemberController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.teamMember.';
    protected $requestClass = TeamMemberRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'teamMember';
    protected $routePrefix = 'TeamMember.index';
    // $uploadPath = strtolower(class_basename($this->model)) . 's';

    public function __construct(TeamMember $model)
    {
        $this->model = $model;
    }
}
