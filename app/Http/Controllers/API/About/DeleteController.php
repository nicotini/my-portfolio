<?php

namespace App\Http\Controllers\API\About;

use App\Http\Controllers\Controller;
use App\Http\Resources\About\AboutResource;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke(About $about)
    {
        $about->delete();
        Storage::disk('public')->delete($about->path_image);
        Storage::disk('public')->delete(str_replace('images/', 'images/prev_', $about->path_image ));
        return response([]);
    }
}
