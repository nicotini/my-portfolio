<?php

namespace App\Http\Resources\Skill;

use Illuminate\Http\Resources\Json\JsonResource;

class SkillResource extends JsonResource
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
            'proficiency' => $this->proficiency,
            'service_id' => $this->service_id,
            'service_title' => $this->service->title
        ];
    }
}
