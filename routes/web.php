<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\VCardController;
use App\Http\Controllers\MailingController;
use App\Http\Controllers\PideController;
use App\Http\Controllers\SubscriptionController;

Route::get('/', function () {
    return 'API REST - ERP  ';
});

Route::prefix('pide')->group(function () {
    Route::post('sel-reniec', [PideController::class, 'getReniec']);
    Route::post('sel-cextranjeria', [PideController::class, 'getCarnetExtranjeria']);

    Route::post('acceso', [ReporteController::class, 'loginUser']);
});

Route::prefix('v1')->group(function () {
    // Route::post('vcard-member', [VCardController::class, 'vCardMemberSearch']);
    // Route::post('contact-message', [MailingController::class, 'webSendContactMail']);
    // Route::post('add-subscriber', [SubscriptionController::class, 'addSubscriber']);
});
