<?php

use App\Http\Controllers\Api\DocumentController;
use Illuminate\Support\Facades\Route;

Route::prefix('documents')->group(function () {
    Route::get('{document}', [DocumentController::class, 'getOne'])->where('document', '[0-9]+');;
    Route::post('generate', [DocumentController::class, 'generate']);
});
