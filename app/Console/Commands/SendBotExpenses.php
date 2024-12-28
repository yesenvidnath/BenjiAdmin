<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SendBotExpenses extends Command
{
    protected $signature = 'bot:send-expenses';
    protected $description = 'Send expenses data to bot service';

    public function handle()
    {
        try {
            $response = Http::withToken(config('services.bot.token'))
                ->post('http://127.0.0.1:8000/api/Bot-service/expenses');

            if ($response->successful()) {
                $this->info('Expenses sent to bot successfully');
                return 0;
            }

            $this->error('Failed to send expenses to bot');
            return 1;
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
            return 1;
        }
    }
}
