<?php

namespace App\Http\Controllers;

use App\Http\Requests\Message\StoreRequest;
use App\Http\Resources\Message\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index() {
        $messages = Message::latest()->get();
        $messages = MessageResource::collection($messages)->resolve();
        return view('chat.room', compact('messages'));
    }

    public function room($roomId) {
//        dd('room');
    }

}
