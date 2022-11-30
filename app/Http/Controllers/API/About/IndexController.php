<?php

namespace App\Http\Controllers\API\About;

use App\Http\Controllers\API\About\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\About\AboutResource;
use App\Models\About;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        
        $aboutInfo = About::latest()->first();
       /*  if($aboutInfo) {
            return new AboutResource($aboutInfo);
        } else {
            return response([]);
        } */
        return new AboutResource($aboutInfo);
       
    }
}
