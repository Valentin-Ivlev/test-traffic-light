<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['type'];

    /**
     * Получить все логи, связанные с данным типом сообщения.
     */
    public function trafficLogs()
    {
        return $this->hasMany(TrafficLog::class);
    }
}
