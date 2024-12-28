<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotScheduleController;

Route::get('/', function () {
    return view('login');
});


Route::get('/admin-dashboard', function () {
    return view('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/bot-schedule/toggle', [BotScheduleController::class, 'toggleSchedule'])->name('bot.expenses.send');
    Route::post('/bot-schedule/toggle', [BotScheduleController::class, 'toggleSchedule'])->name('bot.schedule.toggle');
    Route::get('/bot-schedule/status', [BotScheduleController::class, 'getScheduleStatus'])->name('bot.expenses.send');
    Route::get('/bot-schedule/status', [BotScheduleController::class, 'getScheduleStatus'])->name('bot.schedule.status');
});
