<?php

namespace App\Http\Controllers\API\Skill;

use App\Http\Controllers\Controller;
use App\Http\Resources\Skill\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Skill $skill)
    {
       
        
        return new SkillResource($skill);
    }
}
