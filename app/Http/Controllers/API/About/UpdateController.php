<?php

namespace App\Http\Controllers\API\About;

use App\Http\Controllers\Controller;
use App\Http\Requests\About\UpdateRequest;
use App\Models\About;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, About $about)
    {
        $data = $request->validated();
        $about->update($data);
        return response([]);
    }
}
