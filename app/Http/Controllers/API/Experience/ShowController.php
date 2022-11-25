<?php

namespace App\Http\Controllers\API\Experience;

use App\Http\Controllers\Controller;

use App\Http\Resources\Experience\ExperienceResource;

use App\Models\Experience;
use Illuminate\Http\Request;

class ShowController extends Controller
{
   public function __invoke(Experience $experience)
   {
      return new ExperienceResource($experience);
     
   }
}
