<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BotScheduleController extends Controller
{
    public function toggleSchedule(Request $request)
    {
        $enabled = $request->input('enabled');

        if ($enabled) {
            Cache::put('bot_auto_fetch_enabled', true, now()->addYears(1));
            return response()->json(['message' => 'Auto-fetch schedule enabled']);
        } else {
            Cache::forget('bot_auto_fetch_enabled');
            return response()->json(['message' => 'Auto-fetch schedule disabled']);
        }
    }

    public function getScheduleStatus()
    {
        $enabled = Cache::get('bot_auto_fetch_enabled', false);
        return response()->json(['enabled' => $enabled]);
    }
}
