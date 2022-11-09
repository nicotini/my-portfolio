<?php

namespace App\Http\Controllers\API\Service;

use App\Http\Controllers\Controller;
use App\Http\Resources\Service\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Service $service)
    {
        
        return new ServiceResource($service);
    }
}
