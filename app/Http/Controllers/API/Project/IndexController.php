<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\API\Project\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Project\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $projects = Project::orderBy('id', 'DESC')->get();
        return ProjectResource::collection($projects);
    }
}
