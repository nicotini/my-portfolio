<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\API\Project\BaseController;

use App\Http\Resources\Project\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(Project $project)
    {
        return new ProjectResource($project);
    }
}
