<?php

namespace App\Http\Requests\Administration\Team;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class AssignPlayerRequest extends FormRequest
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
            // Add validation for the pivot table (player_team)
            'players'         => ['required', 'array'],
            'players.*'       => ['exists:players,id'],
            'players.*'       => ['exists:event_player,player_id'],
        ];
    }

    // public function rules(): array
    // {
    //     return [
    //         'players' => [
    //             'required',
    //             'array',
    //             function ($attribute, $value, $fail) {
    //                 // Loop through the player IDs in the 'players' array
    //                 foreach ($value as $playerId) {
    //                     // Check if the player ID exists in the 'players' table
    //                     if (!DB::table('players')->where('id', $playerId)->exists()) {
    //                         $fail("Player with ID {$playerId} does not exist in the 'players' table.");
    //                     }

    //                     // Check if the player ID exists in the 'event_registrations' table
    //                     if (!DB::table('event_registrations')->where('player_id', $playerId)->exists()) {
    //                         $fail("Player with ID {$playerId} does not exist in the 'event_registrations' table.");
    //                     }
    //                 }
    //             }
    //         ],
    //     ];
    // }

}
