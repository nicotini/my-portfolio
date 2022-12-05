<?php

namespace App\Http\Controllers\API\Message;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Message $message)
    {
        $message->delete();
        return response([]);
    }
}
