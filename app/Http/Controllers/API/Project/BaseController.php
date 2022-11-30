<?php
namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\Controller;
use App\Services\Project\ProjectService;

class BaseController extends Controller
{
    public $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }
}