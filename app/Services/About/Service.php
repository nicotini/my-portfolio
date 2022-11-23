<?php
namespace App\Services\About;

use App\Models\About;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Service {
    public function update($data, $about) {
        $file = isset($data['cvs'][0]) ? $data['cvs'][0] : false;
        $image = isset($data['images'][0]) ? $data['images'][0] : false;
        unset($data['images'], $data['cvs']);
        if($image) {
                $name = md5(Carbon::now() . '_' . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
                $previewName = 'prev_' .  $name;
                $filePath = Storage::disk('public')->putFileAs('/images', $image, $name);
           
            
            Storage::disk('public')->delete($about->path_image);
            Storage::disk('public')->delete(str_replace('images/', 'images/prev_', $about->path_image ));
            $data['path_image'] = $filePath;
            $data['url_image'] = url('/storage/' . $filePath);
            $data['preview_url'] = url('/storage/images/' . $previewName);
            $data['path_cv'] = $about['path_cv'];
            $data['url_cv'] = $about['url_cv'];

                \Intervention\Image\Facades\Image::make($image)
                ->encode('jpg', 50)
                ->fit(100, 100)
                ->save(storage_path('app/public/images/'. $previewName));
                

        } else {
            $data['path_image'] = $about['path_image'];
            $data['url_image'] = $about['url_image'];
            $data['preview_url'] = $about['preview_url'];
        }
        
        if($file) {
            
                $fileName = Carbon::now()->format('Y-m-d') . '_' .$file->getClientOriginalName();
                $cvPath = Storage::disk('public')->putFileAs('/files', $file, $fileName);
            
                Storage::disk('public')->delete($about->path_cv);
                $data['path_cv'] = $cvPath;
                $data['url_cv'] = url('/storage/' . $cvPath);


        } else {
            $data['path_cv'] = $about['path_cv'];
            $data['url_cv'] = $about['url_cv'];
            
        }


        return $about->update($data);
    }

    public function store($data) 
    {
        $images = $data['images'];
        $cvs = $data['cv'];
        unset($data['images'], $data['cv']);
        foreach($images as $image) {
            $name = md5(Carbon::now() . '_' . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $previewName = 'prev_' .  $name;
            $filePath = Storage::disk('public')->putFileAs('/images', $image, $name);
        }

        foreach($cvs as $cv) {
            $fileName = Carbon::now()->format('Y-m-d') . '_' . $cv->getClientOriginalName();
            $cvPath = Storage::disk('public')->putFileAs('/files', $cv, $fileName);
        }

        $about = About::create([
            'name' => $data['name'],
            'desc' => $data['desc'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'social_alias' => $data['social_alias'],
            'path_cv' => $cvPath,
            'url_cv' => url('/storage/' . $cvPath),
            'url_image' => url('/storage/' . $filePath),
            'path_image' => $filePath,
            'preview_url' => url('/storage/images/' . $previewName)
        ]);
        \Intervention\Image\Facades\Image::make($image)
            ->encode('jpg', 50)
            ->fit(100, 100)
            ->save(storage_path('app/public/images/'. $previewName));

            return $about;
    }

     
}
