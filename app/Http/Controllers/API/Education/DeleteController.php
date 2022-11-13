<?php

namespace App\Http\Controllers\API\Education;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Education $education)
    {
        $education->delete();
        return response([]);
    }
}
