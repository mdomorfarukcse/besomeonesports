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
        $rules = [
            'grade' => ['required', 'string', 'max:50'],
            'division_id' => ['required', 'string', 'max:50'],
            'status' => ['required', 'in:Active,Inactive,Banned'],
        ];

        // Iterate over each player's data
        foreach ($this->input('players', []) as $key => $player) {
            $playerRules = [
                "players.{$key}.first_name" => ['required', 'max:50'],
                "players.{$key}.last_name" => ['required', 'max:50'],
                "players.{$key}.birthdate" => ['nullable', 'date', 'date_format:Y-m-d'],
                "players.{$key}.contact_number" => ['required', 'string', 'max:20'],
                "players.{$key}.shirt_size" => ['required', 'string', 'max:50'],
                "players.{$key}.short_size" => ['required', 'string', 'max:50'],
                "players.{$key}.city" => ['required', 'string', 'max:50'],
                "players.{$key}.state" => ['required', 'string', 'max:50'],
                "players.{$key}.postal_code" => ['required', 'string', 'max:10'],
                "players.{$key}.street_address" => ['required', 'string', 'max:100'],
                "players.{$key}.position" => ['nullable', 'string'],
                "players.{$key}.note" => ['nullable', 'string'],
            ];

            $rules = array_merge($rules, $playerRules);
        }

        // Additional rules for parent/guardian info
        $rules += [
            'guardian1_name' => ['required', 'string'],
            'guardian1_email' => ['nullable', 'email'],
            'guardian1_contact' => ['nullable', 'string', 'max:20'],
            'guardian1_relationship' => ['nullable', 'string', 'max:20'],
            // Add similar rules for other guardians if needed
            'guardian_id' => ['nullable', 'integer', 'exists:users,id'],
            'guardian_relation' => ['nullable', 'string'],
        ];

        return $rules;
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
