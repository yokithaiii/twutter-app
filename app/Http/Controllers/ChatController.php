<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Requests\messageformrequest;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Collection;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Room::all();
        foreach ($chats as $key => $chat) {
            $user_1 = User::find($chat->user_me_id);
            $user_2 = User::find($chat->user_to_id);
            if (auth()->user() == $user_1) {
                $arr[] = collect([
                    'chat_id' => $chat->id,
                    'user_me_id' => $user_1,
                    'user_to_id' => $user_2,
                ]);
            } elseif (auth()->user() == $user_2) {
                $arr[] = collect([
                    'chat_id' => $chat->id,
                    'user_me_id' => $user_2,
                    'user_to_id' => $user_1,
                ]);
            } else {
            }
        }
        return view('messages.index', compact('arr'));
    }

    public function messages() {
        return Message::query()->with('use2')->get();
    }

    public function send(messageformrequest $request) {
        $message = $request->user()->messages()->create($request->validated());

        broadcast(new MessageSent($request->user(), $message));
        return $message;
    }

    public function chat($id) {
        $userId = auth()->user();
        $room = Room::firstOrCreate([
            'user_me_id' => $userId->id,
            'user_to_id' => $id,
        ]);
        return redirect()->route('messages.room', $room);
    }

    public function room($room) {
        $roomArr = Room::find($room);
        $user_1 = User::find($roomArr->user_me_id);
        $user_2 = User::find($roomArr->user_to_id);
        if (auth()->user() == $user_1) {
            $roomArr['user_me_id'] = $user_1;
            $roomArr['user_to_id'] = $user_2;
        }
        elseif (auth()->user() == $user_2) {
            $roomArr['user_me_id'] = $user_2;
            $roomArr['user_to_id'] = $user_1;
        }
        else {
        }

        return view('messages.room', compact('roomArr'));
    }

}
