<?php
namespace App\Services\Project;
use App\Services\Service;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectService extends Service {
    public function store($data) 
    {
       try {
        $images = $data['images'];
        unset($data['images']);
        $image = $images[0];
        
        
        $project = Project::create([
            'title' => $data['title'],
            'desc' => $data['desc'],
            'link' => $data['link'],
            'url_image' => url('/storage/' . $this->filePath($image)),
            'path_image' => $this->filePath($image),
            'preview_url' => url('/storage/images/' . $this->previewName($image))
        ]);
        
        $this->makePreview($image);

       } catch(\Exception $exception) {
            abort(500);
       }
        

        return $project;
    }


    public function update($project, $data) {
        $image = isset($data['images']) ? $data['images'][0] : false;
        unset($data['images']);
        
        if($image) {
            $filePath = $this->filePath($image);
            
            $this->deleteImage($project);
             
            $data['path_image'] = $filePath;
            $data['url_image'] = url('/storage/' . $filePath);
            $data['preview_url'] = url('/storage/images/' . $this->previewName($image));
            

            $this->makePreview($image);

        } else {
            $data['path_image'] = $project->path_image;
            $data['url_image'] = $project->url_image;
            $data['preview_url'] = $project->preview_url;
        }

        
        return $project->update($data);
    }


    public function deleteProject($project)
    {
        if($project->path_image) {
           $this->deleteImage($project);
        }
    }

}