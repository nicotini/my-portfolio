<?php

namespace App\Http\Controllers\API\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\StoreRequest;
use App\Http\Requests\Service\UpdateRequest;
use App\Http\Resources\Service\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Service $service)
    {
       $data = $request->validated();
       $service->update($data);
        return response([]);
    }
}