<?php

namespace App\Http\Controllers\API\Testimonial;

use App\Http\Controllers\Controller;
use App\Http\Resources\Testimonial\TestimonialResource;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Testimonial $testimonial)
    {
        return new TestimonialResource($testimonial);
    }
}
