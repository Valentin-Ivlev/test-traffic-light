<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrafficLog extends Model
{
    protected $fillable = ['message_id'];

    /**
     * Получить тип сообщения, связанный с данным логом.
     */
    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
