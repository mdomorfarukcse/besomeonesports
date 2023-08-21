<?php

namespace App\Http\Requests\Administration\Player;

use Illuminate\Foundation\Http\FormRequest;

class PlayerStoreRequest extends FormRequest
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
            'player_id' => ['required', 'string', 'unique:players,player_id'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            "first_name" => ['required', 'max:50'],
            "middle_name" => ['nullable', 'string', 'max:50'],
            "last_name" => ['required', 'max:50'],
            "birthdate" => ['required', 'date', 'date_format:Y-m-d'],
            "contact_number" => ['required', 'string', 'max:20'],
            "city" => ['required', 'string', 'max:50'],
            "state" => ['required', 'string', 'max:50'],
            "postal_code" => ['required', 'string', 'max:10'],
            "street_address" => ['required', 'string', 'max:100'],
            "extended_address" => ['string', 'max:100'],
            "position" => ['required', 'string'],
            "height" => ['nullable', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            "weight" => ['nullable', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            "note" => ['nullable', 'string'],
            "status" => ['required','in:Active,Inactive'],

            // Parents Info
            "father_name" => ['required', 'string'],
            "father_email" => ['nullable', 'email'],
            "father_contact" => ['nullable', 'string', 'max:20'],
            "mother_name" => ['required', 'string'],
            "mother_email" => ['nullable', 'email'],
            "mother_contact" => ['nullable', 'string', 'max:20'],

            // Guardian Info
            "guardian_relation" => ['required', 'string'],
            "guardian_name" => ['required', 'string'],
            "guardian_email" => ['nullable', 'email'],
            "guardian_contact" => ['required', 'string', 'max:20'],
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
            'player_id.unique' => 'The Player ID Already exists. It should be Unique.',
            'status.in' => 'The Status should be Active or Inactive only.',
        ];
    }
}
