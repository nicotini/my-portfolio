<?php

namespace App\Http\Resources\Education;

use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
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
            'institution' => $this->institution,
            'period' => $this->period,
            'degree' => $this->degree,
            'department' => $this->department
        ];
    }
}
