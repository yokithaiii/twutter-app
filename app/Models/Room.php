<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_me_id',
        'user_to_id',
    ];
    protected $table = 'chats';

    public function user() {
        return $this->belongsTo(User::class);
    }
}
