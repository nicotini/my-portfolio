<?php
namespace App\Http\Controllers\API\Testimonial;

use App\Http\Controllers\Controller;

use App\Services\Testimonial\TestimonialService;


class BaseController extends Controller
{
    public $service;

    public function __construct(TestimonialService $service)
    {
        $this->service = $service;
    }
}