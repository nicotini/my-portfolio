<?php

namespace App\Http\Controllers\API\Experience;

use App\Http\Controllers\Controller;
use App\Http\Requests\Experience\StoreRequest;
use App\Models\Experience;
use Illuminate\Http\Request;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request)
   {
     $data = $request->validated();
     Experience::create($data);
     return response([]);
     
   }
}
