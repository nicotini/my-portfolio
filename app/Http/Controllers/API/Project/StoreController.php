<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\API\Project\BaseController;

use App\Http\Requests\Project\StoreRequest;

use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return response(['message' => 'success']);
    }
}
