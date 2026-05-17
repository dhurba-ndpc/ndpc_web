<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\TeamMemberRequest;
use App\Models\TeamMember;


class TeamMemberController extends AdminBaseController
{
    protected string $viewPath = 'backend.teamMember.';
    protected string $requestClass = TeamMemberRequest::class;
    protected array $uploadFields = ['image'];
    protected string $uploadPath = 'teamMember';
    protected string $routePrefix = 'TeamMember.index';
    // $uploadPath = strtolower(class_basename($this->model)) . 's';

    public function __construct(TeamMember $model)
    {
        $this->model = $model;
    }
}
