<?php

namespace App\Http\Controllers\API\Testimonial;

use App\Http\Controllers\Controller;
use App\Http\Resources\Testimonial\TestimonialResource;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $testimonials = Testimonial::orderBy('id', 'DESC')->get();
        return TestimonialResource::collection($testimonials);
    }
}
