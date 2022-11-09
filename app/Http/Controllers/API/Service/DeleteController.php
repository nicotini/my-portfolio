<?php

namespace App\Http\Controllers\API\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;


class DeleteController extends Controller
{
    public function __invoke(Service $service)
    {
        $service->delete();
        return response([]);
        
    }
}
