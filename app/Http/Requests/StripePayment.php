<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StripePayment extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'card-number' => 'required',
            'card-expiry-month' => 'required',
            'card-expiry-year' =>'required',
            'card-cvc' => 'required',
        ];
    }
}
