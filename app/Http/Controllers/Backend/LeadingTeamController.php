<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\TeamMemberRequest;
use App\Models\TeamMember;

class LeadingTeamController extends AdminBaseController
{

    protected string $viewPath = 'backend.teamMember.leadingTeams.';
    protected string $requestClass = TeamMemberRequest::class;
    protected array $uploadFields = ['image'];
    protected string $uploadPath = 'leadingTeams';
    protected string $routePrefix = 'leadingTeams.index';


    public function __construct(TeamMember $model)
    {
        $this->model = $model;
    }
}
