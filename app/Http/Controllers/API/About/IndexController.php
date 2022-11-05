<?php

namespace App\Http\Controllers\API\About;

use App\Http\Controllers\Controller;
use App\Http\Resources\About\AboutResource;
use App\Models\About;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $aboutInfo = About::latest()->first();
        return new AboutResource($aboutInfo);
    }
}
