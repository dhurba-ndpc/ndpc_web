<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\TeamMemberRequest;
use App\Models\TeamMember;

class LeadingTeamController extends AdminBaseController
{

    protected $model;
    protected $viewPath = 'backend.teamMember.leadingTeams.';
    protected $requestClass = TeamMemberRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'leadingTeams';
    protected $routePrefix = 'leadingTeams.index';


    public function __construct(TeamMember $model)
    {
        $this->model = $model;
    }
}
