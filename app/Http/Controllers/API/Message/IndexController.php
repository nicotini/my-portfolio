<?php

namespace App\Http\Controllers\API\Message;

use App\Http\Controllers\Controller;
use App\Http\Resources\Message\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $messages = Message::orderBy('id', 'DESC')->get();
       
        return MessageResource::collection($messages);
       
    }
}
