<?php

namespace App\Http\Controllers\API\Education;

use App\Http\Controllers\Controller;
use App\Http\Resources\Education\EducationResource;
use App\Models\Education;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $educations = Education::orderBy('id', 'DESC')->get();
        return EducationResource::collection($educations);
    }
}
