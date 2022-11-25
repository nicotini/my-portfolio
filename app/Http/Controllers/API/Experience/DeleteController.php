<?php

namespace App\Http\Controllers\API\Experience;

use App\Http\Controllers\Controller;

use App\Models\Experience;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
   public function __invoke(Experience $experience)
   {
      $experience->delete();
      return response([]);
     
   }
}
