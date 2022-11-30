<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProjectResource extends JsonResource
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
            'title' => $this->title,
            'desc' => $this->desc,
            'link' => $this->link,
            'path_image' => $this->path_image,
            'url_image' => $this->url_image,
            'preview_url' => $this->preview_url,
            'size' => $this->path_image ? Storage::disk('public')->size($this->path_image) : null,
            'file_name' => str_replace('images/', '', $this->path_image)   
        ];
    }
}
