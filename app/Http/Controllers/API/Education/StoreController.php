<?php

namespace App\Http\Controllers\API\Education;

use App\Http\Controllers\Controller;
use App\Http\Requests\Education\StoreRequest;
use App\Models\Education;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
       $data = $request->validated();
       Education::create($data);
       return response([]);

    }
}
