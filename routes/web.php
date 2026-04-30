<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('form');
});

Route::get('send-email',[EmailController::class, 'sendEmail']);

Route::post('/contact',[EmailController::class, 'sendContactEmail'])->name('contact');