<?php

namespace App\Http\Resources\Testimonial;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class TestimonialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'position' => $this->position,
            'testimony' => $this->testimony,
            'photo_path' => $this->photo_path,
            'url_image' => $this->url_image,
            'rating' => $this->rating,
            'size' => $this->photo_path ? Storage::disk('public')->size($this->photo_path) : null,
            'file_name' => str_replace('images/', '', $this->photo_path)     
        ];
    }
}
