<?php

namespace App\Http\Controllers\API\About;

use App\Http\Controllers\Controller;
use App\Http\Resources\About\AboutResource;
use App\Models\About;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(About $about)
    {
        
        return new AboutResource ($about);
    }
}
