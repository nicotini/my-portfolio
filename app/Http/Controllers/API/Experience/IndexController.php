<?php

namespace App\Http\Controllers\API\Experience;

use App\Http\Controllers\Controller;
use App\Http\Resources\Experience\ExperienceResource;
use App\Models\Experience;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function __invoke()
   {
     $experiences = Experience::orderBy('id', 'DESC')->get();
     return ExperienceResource::collection($experiences);
     
   }
}
