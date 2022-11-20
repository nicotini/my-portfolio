<?php

namespace App\Http\Controllers\API\About;

use App\Http\Controllers\Controller;
use App\Http\Requests\About\StoreRequest;
use App\Models\About;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $images = $data['images'];
        unset($data['images']);
        foreach($images as $image) {
            $name = md5(Carbon::now() . '_' . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $previewName = 'prev_' .  $name;
            $filePath = Storage::disk('public')->putFileAs('/images', $image, $name);
        }
        $about = About::create([
            'name' => $data['name'],
            'desc' => $data['desc'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'social_alias' => $data['social_alias'],
            'url_image' => url('/storage/' . $filePath),
            'path_image' => $filePath,
            'preview_url' => url('/storage/images/' . $previewName)
        ]);
        \Intervention\Image\Facades\Image::make($image)->fit(100, 100)
            ->save(storage_path('app/public/images/'. $previewName));
        return response(['message' => 'success']);
    }
}
