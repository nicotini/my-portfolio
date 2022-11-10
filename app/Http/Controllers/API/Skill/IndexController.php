<?php

namespace App\Http\Controllers\API\Skill;

use App\Http\Controllers\Controller;
use App\Http\Resources\Skill\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $skills = Skill::with('service')->orderBy('id', 'DESC')->get();
        
        return SkillResource::collection($skills);
    }
}
