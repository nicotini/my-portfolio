<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\Skill\SkillResource;
use App\Models\Skill;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('main.index');
    }
}