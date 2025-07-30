<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\VCardController;
use App\Http\Controllers\MailingController;
use App\Http\Controllers\PideController;
use App\Http\Controllers\SubscriptionController;

Route::get('/', function () {
    return 'API REST - PIDE  ';
});

Route::prefix('pide')->group(function () {
    Route::post('login', [PideController::class, 'loginAuth']);
    Route::post('sel-areas', [PideController::class, 'getAreas']);
    
    Route::post('ins-permissions', [PideController::class, 'insertPermissions']);
    Route::post('ins-usuario', [PideController::class, 'insertUsers']);
    Route::post('upd-reniec-credentials', [PideController::class, 'updateReniecCredentials']);
    Route::post('upd-password-user', [PideController::class, 'updatePasswordUser']);

    Route::post('sel-menus-user', [PideController::class, 'getMenusByUser']);
    Route::post('sel-menus', [PideController::class, 'getMenus']);
    Route::post('sel-users', [PideController::class, 'getAllUsers']);

    Route::post('sel-reniec', [PideController::class, 'getReniec']);
    Route::post('sel-cextranjeria', [PideController::class, 'getCarnetExtranjeria']);

    Route::post('sel-partida', [PideController::class, 'getPartida']);
    Route::post('sel-partidaimg', [PideController::class, 'getPartidaImg']);
    Route::post('sel-rvehicular', [PideController::class, 'getRegistroVehicular']);
    Route::post('sel-bienespernatural', [PideController::class, 'getBienesPerNatural']);
    Route::post('sel-bienesperjuridica', [PideController::class, 'getBienesPerJuridica']);

    Route::post('sel-sunedu', [PideController::class, 'getSunedu']);

    Route::post('sel-antpol-numdoc', [PideController::class, 'getAPolicialNumDoc']);
    Route::post('sel-antpol-nompatmat', [PideController::class, 'getAPolicialNomPatMat']);
    Route::post('sel-antpol-nompat', [PideController::class, 'getAPolicialNomPat']);
    Route::post('sel-antpol-codper', [PideController::class, 'getAPolicialCodPer']);

    Route::post('sel-ant-judicial', [PideController::class, 'getAJudiciales']);

    Route::post('acceso', [ReporteController::class, 'loginUser']);
});

Route::prefix('v1')->group(function () {
    // Route::post('vcard-member', [VCardController::class, 'vCardMemberSearch']);
    // Route::post('contact-message', [MailingController::class, 'webSendContactMail']);
    // Route::post('add-subscriber', [SubscriptionController::class, 'addSubscriber']);
});
