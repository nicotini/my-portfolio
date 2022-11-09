<?php

namespace App\Http\Controllers\API\Service;

use App\Http\Controllers\Controller;
use App\Http\Resources\Service\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $services = Service::orderBy('id', 'DESC')->get();
        return ServiceResource::collection($services);
    }
}
