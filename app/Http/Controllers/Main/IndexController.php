<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Resources\Service\ServiceResource;

use App\Models\Service;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getServices()
    {
        
        $services = Service::all();
       
        return ServiceResource::collection($services);
        
      
    }
}
