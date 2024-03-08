<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Address extends FormRequest
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
            'fullname' => 'required|max:20',
            'number' => 'required|max:10',
            'state' => 'required',
            'city' => 'required',
            'houseNo' => 'required',
            'pincode' => 'required|numeric',
        ];
    }
}
