<?php

namespace App\Http\Controllers\API\Education;

use App\Http\Controllers\Controller;

use App\Http\Requests\Education\UpdateRequest;
use App\Models\Education;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Education $education, UpdateRequest $request)
    {
       $data = $request->validated();
       $education->update($data);
       return response([]);

    }
}
