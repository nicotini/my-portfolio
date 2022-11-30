<?php
namespace App\Http\Controllers\API\About;

use App\Http\Controllers\Controller;
use App\Services\About\AboutService;

class BaseController extends Controller
{
    public $service;

    public function __construct(AboutService $service)
    {
        $this->service = $service;
    }
}