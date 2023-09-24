<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class CreditCardValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'pan'          => 'required|numeric|digits_between:16,19',
            'expiry_date'  => 'required|date|after:today',
            'cvv'          => 'required|regex:/^\d{3,4}$/',
        ];
    }
}
