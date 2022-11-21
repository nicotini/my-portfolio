<?php
namespace App\Services\About;

use App\Models\About;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Service {
    public function update($data, $about) {

        $images = isset($data['images']) ? $data['images'] : null;
       // $imageForDelete = isset($data['id_image_delete']) ? $data['id_image_delete'] : null;
        unset($data['images'], $data['id_image_delete']);
        if($images) {
            foreach($images as $image) {
                $name = md5(Carbon::now() . '_' . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
                $previewName = 'prev_' .  $name;
                $filePath = Storage::disk('public')->putFileAs('/images', $image, $name);
            }
            Storage::disk('public')->delete($about->path_image);
            Storage::disk('public')->delete(str_replace('images/', 'images/prev_', $about->path_image ));

            $updatedAbout = $about->update([
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

        } else {
            $updatedAbout = $about->update([
                'name' => $data['name'],
                'desc' => $data['desc'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'social_alias' => $data['social_alias'],
                'url_image' => $about['url_image'],
                'path_image' =>  $about['path_image'],
                'preview_url' =>  $about['preview_url']
            ]);
        }

        return $updatedAbout;
    }

    public function store($data) 
    {
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
            return $about;
    }
}
