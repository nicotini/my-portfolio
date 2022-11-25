<?php

namespace App\Http\Controllers\API\Experience;

use App\Http\Controllers\Controller;
use App\Http\Requests\Experience\UpdateRequest;
use App\Models\Experience;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
   public function __invoke(UpdateRequest $request, Experience $experience)
   {
      $data = $request->validated();
      $experience->update($data);
      return response([]);
     
   }
}
