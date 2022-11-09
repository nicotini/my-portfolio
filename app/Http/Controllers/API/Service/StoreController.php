<?php

namespace App\Http\Controllers\API\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\StoreRequest;
use App\Http\Resources\Service\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
       $data = $request->validated();
       $about = Service::create($data);
        return response([]);
    }
}