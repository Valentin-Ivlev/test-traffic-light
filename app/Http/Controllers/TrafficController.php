<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\TrafficLog;

class TrafficController extends Controller
{
    /**
     * Страница со светофором.
     */
    public function index()
    {
        $logs = TrafficLog::with('message')->latest()->get();
        return view('traffic.index', compact('logs'));
    }

    /**
     * Записывает сообщение в лог и возвращает время создания записи.
     */
    public function forward(Request $request)
    {
        // Получаем сообщение из запроса
        $messageType = $request->get('message');

        // Проверяем, существует ли уже такое сообщение в базе данных
        $message = Message::firstOrCreate(['type' => $messageType]);

        // Создаем новую запись в логе с ID сообщения
        $log = TrafficLog::create(['message_id' => $message->id]);

        // Возвращаем время создания записи в формате JSON
        return response()->json(['time' => $log->created_at->toDateTimeString()]);
    }
}
