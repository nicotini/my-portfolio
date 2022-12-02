<?php
namespace App\Services\Testimonial;

use App\Models\Testimonial;
use App\Services\Service;

class TestimonialService extends Service
{
    public function store($data)
    {
            $images = $data['images'];
            unset($data['images']);
            $image = $images[0];
            $this->makeReviewImage($image);
            $filePath = 'images/' . $this->fileName($image);
           
           
            $testimonial = Testimonial::create([
                'name' => $data['name'],
                'position' => $data['position'],
                'testimony' => $data['testimony'],
                'photo_path' => $filePath,
                'url_image' => url('/storage/' . $filePath),
                'rating' => $data['rating']
            ]);
           
            return $testimonial;
    }

    public function update($data, $testimonial) 
    {
        $image = isset($data['images']) ? $data['images'][0] : false;
        unset($data['images']);
        
        if($image) {
            $this->makeReviewImage($image);
            $filePath = 'images/' . $this->fileName($image);
            
            $this->deleteTestimonialImage($testimonial);
             
            $data['photo_path'] = $filePath;
            $data['url_image'] = url('/storage/' . $filePath);
            
          

        } else {
            $data['photo_path'] = $testimonial->photo_path;
            $data['url_image'] =  $testimonial->url_image;
            
        }

        return $testimonial->update($data);
    }

    public function deleteTestimonial($testimonial)
    {
        if($testimonial->photo_path) {
            $this->deleteTestimonialImage($testimonial);
         }
    }
}