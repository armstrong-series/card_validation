<?php

use App\Http\Controllers\CreditCardValidationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(CreditCardValidationController::class)->group(function () {
    Route::post('/validate-credit-card', 'validateCreditCard');

});
