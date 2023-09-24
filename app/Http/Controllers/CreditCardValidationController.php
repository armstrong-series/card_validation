<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CreditCardValidationService;
use  App\Http\Requests\Payment\CreditCardValidationRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;
use Exception;
use Illuminate\Http\JsonResponse;

class CreditCardValidationController extends Controller
{

    public function __construct(protected CreditCardValidationService $creditCardValidationService)
    {
    }

    public function validateCreditCard(CreditCardValidationRequest $request): JsonResponse
    {
        try {
            return $this->creditCardValidationService->validateCreditCard($request);
        } catch (Exception $ex) {
            Log::info(["Credit Card Error:"=> $ex->getMessage(), "Stack trace:" => $ex->getTrace(), "File" => $ex->getFile()]);
            return response()->json(['error' => $ex->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
