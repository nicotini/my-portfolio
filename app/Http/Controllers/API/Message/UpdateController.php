<?php

namespace App\Http\Controllers\API\Message;

use App\Http\Controllers\Controller;
use App\Http\Requests\Message\UpdateRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Message $message, UpdateRequest $request)
    {
        $data = $request->validated();
        $message->update($data);
        return response([]);
    }
}
