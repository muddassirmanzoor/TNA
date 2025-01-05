<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [\App\Http\Controllers\Api\LoginController::class, 'login']);
Route::post('production/login', [\App\Http\Controllers\Api\LoginController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('get-pst-paper', [\App\Http\Controllers\Api\PaperController::class, 'getPstPaper']);

    Route::post('submit-pst-paper', [\App\Http\Controllers\Api\PaperController::class, 'submitPstPaper']);

    Route::post('submit-result', [\App\Http\Controllers\Api\PaperController::class, 'submitResult']);

    Route::post('send-result-email', [\App\Http\Controllers\Api\PaperController::class, 'sendResultEMail']);

    Route::post('submit-user-images', [\App\Http\Controllers\Api\PaperController::class, 'submitUserImages']);

    Route::get('production/get-pst-paper', [\App\Http\Controllers\Api\PaperController::class, 'getPstPaper']);

    Route::post('production/submit-pst-paper', [\App\Http\Controllers\Api\PaperController::class, 'submitPstPaper']);

    Route::post('production/submit-result', [\App\Http\Controllers\Api\PaperController::class, 'submitResult']);

    Route::post('production/send-result-email', [\App\Http\Controllers\Api\PaperController::class, 'sendResultEMail']);

    Route::post('production/submit-user-images', [\App\Http\Controllers\Api\PaperController::class, 'submitUserImages']);
});


