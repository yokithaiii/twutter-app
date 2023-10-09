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

//    public function store(StoreRequest $request) {
//        $data = $request->validated();
//        $user_sender = auth()->user();
//        $user_receiver = 11;
//        $message = Message::create([
//            'body' => $data['body'],
//            'room_id' => 1,
//            'user_id_sender' => $user_sender->id,
//            'user_id_receiver' => $user_receiver,
//        ]);
//
//        return MessageResource::make($message)->resolve();
//    }

}
