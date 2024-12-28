<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // The scheduler will only run this if the flag is set in cache
        if (cache()->get('bot_auto_fetch_enabled', false)) {
            $schedule->command('bot:send-expenses')
                    ->weekly()
                    ->runInBackground();
        }
    }
}
