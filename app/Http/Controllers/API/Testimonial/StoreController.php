<?php

namespace App\Http\Controllers\API\Testimonial;

use App\Http\Controllers\API\Testimonial\BaseController;
use App\Http\Requests\Testimonial\StoreRequest;
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
