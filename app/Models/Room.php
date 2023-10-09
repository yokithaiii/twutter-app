<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_1_id',
        'user_2_id',
    ];
    protected $table = 'chats';

    public function user() {
        return $this->belongsTo(User::class);
    }
}
