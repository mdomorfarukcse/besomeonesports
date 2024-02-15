<?php

namespace App\Http\Requests\Administration\Coach;

use Illuminate\Foundation\Http\FormRequest;

class CoachUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "position" => ['required', 'string'],
            "status" => ['required','in:Active,Inactive,Banned'],
            "first_name" => ['required', 'max:50'],
            "middle_name" => ['nullable', 'string', 'max:50'],
            "last_name" => ['required', 'max:50'],
            "phone_number" => ['required', 'string', 'max:20'],
            "birthdate" => ['nullable', 'date', 'date_format:Y-m-d'],
            "driver_license_no" => ['nullable', 'string', 'max:20'],
            "city" => ['nullable', 'string', 'max:50'],
            "state" => ['nullable', 'string', 'max:50'],
            "postal_code" => ['nullable', 'string', 'max:10'],
            "street_address" => ['nullable', 'string', 'max:100'],
            "extended_address" => ['nullable', 'string', 'max:100'],
            "note" => ['nullable', 'string'],
        ];
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'status.in' => 'The Status should be Active or Inactive only.',
        ];
    }
}
