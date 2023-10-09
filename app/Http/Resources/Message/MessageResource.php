<?php

namespace App\Http\Resources\Message;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'time' => $this->created_at->diffForHumans(),
            'room_id' => $this->room_id,
            'user_id_sender' => $this->user_id_sender,
            'user_id_receiver' => $this->user_id_receiver,
        ];
    }
}
