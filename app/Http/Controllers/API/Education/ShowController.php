<?php

namespace App\Http\Controllers\API\Education;

use App\Http\Controllers\Controller;
use App\Http\Resources\Education\EducationResource;
use App\Models\Education;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Education $education)
    {
       return new EducationResource($education);
    }
}
