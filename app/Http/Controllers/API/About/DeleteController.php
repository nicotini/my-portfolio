<?php

namespace App\Http\Controllers\API\About;

use App\Http\Controllers\Controller;
use App\Http\Resources\About\AboutResource;
use App\Models\About;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(About $about)
    {
        $about->delete();
        return response([]);
    }
}
