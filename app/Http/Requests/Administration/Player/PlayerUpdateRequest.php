<?php

namespace App\Http\Requests\Administration\Player;

use Illuminate\Foundation\Http\FormRequest;

class PlayerUpdateRequest extends FormRequest
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
            "first_name" => ['required', 'max:50'],
            "middle_name" => ['nullable', 'string', 'max:50'],
            "last_name" => ['required', 'max:50'],
            "birthdate" => ['nullable', 'date', 'date_format:Y-m-d'],
            "contact_number" => ['required', 'string', 'max:20'],
            "grade" => ['required', 'string', 'max:50'],
            "shirt_size" => ['required', 'string', 'max:50'],
            "short_size" => ['required', 'string', 'max:50'],
            "city" => ['required', 'string', 'max:50'],
            "state" => ['required', 'string', 'max:50'],
            "postal_code" => ['required', 'string', 'max:10'],
            "street_address" => ['required', 'string', 'max:100'],
            "extended_address" => ['nullable', 'string', 'max:100'],
            "position" => ['nullable', 'string'],
            "note" => ['nullable', 'string'],
            "status" => ['required','in:Active,Inactive,Banned'],

            // Parents Info
            "father_name" => ['required', 'string'],
            "father_email" => ['nullable', 'email'],
            "father_contact" => ['nullable', 'string', 'max:20'],
            "mother_name" => ['required', 'string'],
            "mother_email" => ['nullable', 'email'],
            "mother_contact" => ['nullable', 'string', 'max:20'],

            // Guardian Info
            "guardian_id" => ['nullable', 'integer', 'exists:users,id'],
            "guardian_relation" => ['nullable', 'string'],
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
