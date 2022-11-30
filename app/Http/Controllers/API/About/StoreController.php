<?php

namespace App\Http\Controllers\API\About;

use App\Http\Controllers\API\About\BaseController;

use App\Http\Requests\About\StoreRequest;

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
