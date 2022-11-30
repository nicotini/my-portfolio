<?php

namespace App\Http\Controllers\API\About;

use App\Http\Controllers\API\About\BaseController;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController
{
    public function __invoke(About $about)
    {
        
        if($about->path_image) {
            Storage::disk('public')->delete($about->path_image);
            Storage::disk('public')->delete(str_replace('images/', 'images/prev_', $about->path_image ));
        }
        if($about->path_cv) {
            Storage::disk('public')->delete($about->path_cv);
        }
       
        $about->delete();
        return response([]);
    }
}
