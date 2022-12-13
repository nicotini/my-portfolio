<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Resources\About\AboutResource;
use App\Http\Resources\Education\EducationResource;
use App\Http\Resources\Experience\ExperienceResource;
use App\Http\Resources\Service\ServiceResource;
use App\Models\About;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Service;

use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function getAbout()
    {
        return new AboutResource(About::latest()->first());
    }

    public function getEducations()
    {
        $educations = Education::orderBy('id', 'DESC')->get();
        return EducationResource::collection($educations);
    }

    public function getExperience()
    {
        $experiences = Experience::orderBy('id', 'DESC')->get();
        return ExperienceResource::collection($experiences);
    }


    public function getServices()
    {
        
        $services = Service::with('skills')->get();
        return ServiceResource::collection($services);
        
      
    }
}
