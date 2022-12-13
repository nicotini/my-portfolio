<?php

namespace App\Http\Resources\Service;

use App\Http\Resources\Skill\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            'icon' => $this->icon,
            'desc' => $this->desc,
           'skills' => SkillResource::collection($this->skills),
            
        ];
    }
}
