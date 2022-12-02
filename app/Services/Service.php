<?php
namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Service

{
   public function imageName($image) 
   {
     return  md5(Carbon::now() . '_' . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            
   }

   public function fileName($file)
   {
    return Carbon::now()->format('Y-m-d') . '_' . $file->getClientOriginalName();
   }

   public function previewName($image) 
   {
    return 'prev_' .  $this->imageName($image);
            
   }
   public function filePath($image)
   {
     
      $filePath = Storage::disk('public')->putFileAs('/images', $image, $this->imageName($image));
      return $filePath;
      
   }

   public function docPath($doc)
   
   {
    return Storage::disk('public')->putFileAs('/files', $doc, $this->fileName($doc));
   }

   public function makePreview($image) {
    \Intervention\Image\Facades\Image::make($image)
            ->encode('jpg', 50)
            ->orientate()
            ->fit(100, 100)
            ->save(storage_path('app/public/images/'. $this->previewName($image)));      
   }
   public function makeReviewImage($image) {
      \Intervention\Image\Facades\Image::make($image)
              ->encode('jpg', 80)
              ->orientate()
              ->fit(250, 250)
              ->save(storage_path('app/public/images/'. $this->fileName($image)));      
     }

     

   public function deleteImage($object) {
            Storage::disk('public')->delete($object->path_image);
            Storage::disk('public')->delete(str_replace('images/', 'images/prev_', $object->path_image));
   }

   public function deleteTestimonialImage($object) {
      Storage::disk('public')->delete($object->photo_path);
      
}

   public function deleteDoc($object) 
   {
          Storage::disk('public')->delete($object->path_cv);
   }
}