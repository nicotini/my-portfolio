<?php

namespace App\Http\Resources\About;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class AboutResource extends JsonResource
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
            'email' => $this->email,
            'phone' => $this->phone,
            'social_alias' => $this->social_alias,
            'desc' => $this->desc,
            'url_image' => $this->url_image,
            'path_image' => $this->path_image,
            'preview_url' => $this->preview_url,
            'size' => Storage::disk('public')->size($this->path_image),
            'file_name' => str_replace('images/', '', $this->path_image)
        ];
    }
}
