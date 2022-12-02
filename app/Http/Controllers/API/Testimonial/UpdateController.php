<?php

namespace App\Http\Controllers\API\Testimonial;

use App\Http\Controllers\API\Testimonial\BaseController;

use App\Http\Requests\Testimonial\UpdateRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Testimonial $testimonial)
    {
        $data = $request->validated();
        $this->service->update($data, $testimonial);
        return response([]);
        
    }
}
