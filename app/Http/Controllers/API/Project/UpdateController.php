<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\API\Project\BaseController;
use App\Http\Requests\Project\UpdateRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(Project $project, UpdateRequest $request)
    {
        $data = $request->validated();
        $this->service->update($project, $data);
        return response([]);
    }
}
