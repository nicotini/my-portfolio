<?php

namespace App\Http\Controllers\API\Testimonial;
use App\Http\Controllers\API\Testimonial\BaseController;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __invoke(Testimonial $testimonial)
    {  
       $this->service->deleteTestimonial($testimonial);
       $testimonial->delete();
       return response([]);
    }
}
