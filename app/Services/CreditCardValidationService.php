<?php

namespace App\Services;

use Illuminate\Http\Response;

class CreditCardValidationService
{

    public function validateCreditCard($request)
    {
        if (!$this->isValidExpiryDate($request->expiry_date)) {
            return response()->json(['error' => 'Invalid expiry date'], Response::HTTP_BAD_REQUEST);
        }

        if (!$this->isValidCvv($request->pan, $request->cvv)) {
            return response()->json(['error' => 'Invalid CVV'], Response::HTTP_BAD_REQUEST);
        }

        if (!$this->isLuhnValid($request->pan)) {
            return response()->json(['error' => 'Invalid credit card number'], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(["message" => "Payment Successful"], Response::HTTP_OK);
    }

    private function isValidExpiryDate($expiryDate)
    {
        $today = now();
        return strtotime($expiryDate) > $today->timestamp;
    }

    private function isValidCvv($pan, $cvv)
    {
        if (substr($pan, 0, 2) === '34' || substr($pan, 0, 2) === '37') {
            return strlen($cvv) === 4;
        }
        return strlen($cvv) === 3;
    }

    private function isLuhnValid($number)
    {
        $number = (string)$number;
        $sum = 0;
        $length = strlen($number);
        $parity = $length % 2;

        for ($i = 0; $i < $length; $i++) {
            $digit = (int)$number[$i];

            if ($i % 2 == $parity) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }

            $sum += $digit;
        }

        return $sum % 10 === 0;
    }
}
