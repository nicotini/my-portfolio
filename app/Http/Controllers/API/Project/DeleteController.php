<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\API\Project\BaseController;

use App\Http\Resources\Project\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __invoke(Project $project)
    {
        $this->service->deleteProject($project);
        $project->delete();
        return response([]);
    }
}
