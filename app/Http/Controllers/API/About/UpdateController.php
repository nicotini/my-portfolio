<?php

namespace App\Http\Controllers\API\About;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\About\UpdateRequest;
use App\Models\About;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, About $about)
    {
        $data = $request->validated();
      // dd($data);
        $this->service->update($data, $about);
        return  response([]);
        
    }
}
