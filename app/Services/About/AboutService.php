<?php
namespace App\Services\About;

use App\Models\About;
use App\Services\Service;


class AboutService extends Service {
    public function update($data, $about) {
       
        $file = isset($data['cvs']) ? $data['cvs'][0] : false;
        $image = isset($data['images']) ? $data['images'][0] : false;
        unset($data['images'], $data['cvs']);
        if($image) {
            $filePath = $this->filePath($image);
            
           // $this->deleteImage($about);
            $data['path_image'] = $filePath;  
            $data['url_image'] = url('/storage/' . $filePath);
            $data['preview_url'] = url('/storage/images/' . $this->previewName($image));
            $data['path_cv'] = $about->path_cv;
            $data['url_cv'] = $about->url_cv;

            $this->makePreview($image);

        } else {
            $data['path_image'] = $about->path_image;
            $data['url_image'] = $about->url_image;
            $data['preview_url'] = $about->preview_url;
        }

        if($file) {
           
           $this->deleteDoc($about);
            $data['path_cv'] = $this->docPath($file);
            $data['url_cv'] = url('/storage/' . $this->docPath($file));
            
        } else {
            $data['path_cv'] = $about->path_cv;
            $data['url_cv'] = $about->url_cv;
        }
        return $about->update($data);
    }

    public function store($data) 
    {
        $images = $data['images'];
        $cvs = $data['cv'];
        unset($data['images'], $data['cv']);
        $image = $images[0];
        $cv = $cvs[0];
      
        $about = About::create([
            'name' => $data['name'],
            'desc' => $data['desc'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'social_alias' => $data['social_alias'],
            'path_cv' => $this->docPath($cv),
            'url_cv' => url('/storage/' . $this->docPath($cv)),
            'url_image' => url('/storage/' . $this->filePath($image)),
            'path_image' => $this->filePath($image),
            'preview_url' => url('/storage/images/' . $this->previewName($image))
        ]);

        $this->makePreview($image);

        return $about;
    }
}
