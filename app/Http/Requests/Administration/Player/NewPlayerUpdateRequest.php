<?php

namespace App\Http\Requests\Administration\Player;

use Illuminate\Foundation\Http\FormRequest;

class NewPlayerUpdateRequest extends FormRequest
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
            "extended_address" => ['string', 'max:100'],
            "position" => ['nullable', 'string'],
            "note" => ['nullable', 'string'],

            // Parents Info
            "guardian1_name" => ['required', 'string'],
            "guardian1_email" => ['nullable', 'email'],
            "guardian1_contact" => ['nullable', 'string', 'max:20'],
            "guardian1_relationship" => ['nullable', 'string', 'max:20'],
            "guardian2_name" => ['nullable', 'string'],
            "guardian2_email" => ['nullable', 'email'],
            "guardian2_contact" => ['nullable', 'string', 'max:20'],
            "guardian2_relationship" => ['nullable', 'string', 'max:20'],
            "guardian3_name" => ['nullable', 'string'],
            "guardian3_email" => ['nullable', 'email'],
            "guardian3_contact" => ['nullable', 'string', 'max:20'],
            "guardian3_relationship" => ['nullable', 'string', 'max:20'],

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
