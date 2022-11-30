<?php

namespace App\Http\Controllers\API\About;

use App\Http\Controllers\API\About\BaseController;

use App\Http\Requests\About\UpdateRequest;
use App\Models\About;


class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, About $about)
    {
        $data = $request->validated();
        $this->service->update($data, $about);
        return  response([]);
        
    }
}
