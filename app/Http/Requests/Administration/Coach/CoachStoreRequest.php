<?php

namespace App\Http\Requests\Administration\Coach;

use Illuminate\Foundation\Http\FormRequest;

class CoachStoreRequest extends FormRequest
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
            'coach_id' => ['required', 'string', 'unique:coaches,coach_id'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            "position" => ['required', 'string'],
            "status" => ['required','in:Active,Inactive,Banned'],
            "first_name" => ['required', 'max:50'],
            "last_name" => ['required', 'max:50'],
            "phone_number" => ['required', 'string', 'max:20'],
            "birthdate" => ['nullablle', 'date', 'date_format:Y-m-d'],
            "driver_license_no" => ['nullablle', 'string', 'max:20'],
            "city" => ['nullablle', 'string', 'max:50'],
            "state" => ['nullablle', 'string', 'max:50'],
            "postal_code" => ['nullablle', 'string', 'max:10'],
            "street_address" => ['nullablle', 'string', 'max:100'],
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
            'coach_id.unique' => 'The Coach ID Already exists. It should be Unique.',
            'status.in' => 'The Status should be Active or Inactive only.',
        ];
    }
}
