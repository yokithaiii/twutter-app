<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Requests\Message\StoreRequest;
use App\Http\Requests\messageformrequest;
use App\Http\Resources\Message\MessageResource;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Collection;

class ChatController extends Controller
{
    //Все чаты в котором участвуем
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

    //Создаем комнату с юзером если не существует комната с ним --доделать не работает
    public function roomCreate($id) {
        $userId = auth()->user();
        $room = Room::firstOrCreate([
            'user_me_id' => $userId->id,
            'user_to_id' => $id,
        ]);
        return redirect()->route('messages.room', $room);
    }

    //Комната с юзером
    public function room($room) {
        //Получаем все сообщения с roomId
        $messages = Message::where('room_id', $room)->get();
        $messages = MessageResource::collection($messages)->resolve();

        //находим комнату с id
        $roomArr = Room::find($room);

        //ищем участников комнаты
        $user_1 = User::find($roomArr->user_me_id);
        $user_2 = User::find($roomArr->user_to_id);

        $info = [
            'roomId' => $room,
            'me' => auth()->user()->id,
        ];

        //условия в котором проверяем входим ли Мы в участниках --доделать хуйня условие может сломаться
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
        session(['roomArr' => $roomArr]);
        return view('messages.room', compact('roomArr', 'messages', 'info'));
    }

    public function store(StoreRequest $request) {

        $roomArr = session('roomArr');
        $data = $request->validated();
        $user_sender = auth()->user();
        $message = Message::create([
            'body' => $data['body'],
            'room_id' => $roomArr->id,
            'user_id_sender' => $user_sender->id,
            'user_id_receiver' => $roomArr->user_to_id->id,
        ]);

        return MessageResource::make($message)->resolve();
    }

}
