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
        $messagesPerPage = 4;
        $messages = Message::paginate($messagesPerPage);
       
        return response()->json([
            'paginate' => MessageResource::collection($messages),
            'pageCount' => $messages->lastPage()
        ]);
       
    }
}
