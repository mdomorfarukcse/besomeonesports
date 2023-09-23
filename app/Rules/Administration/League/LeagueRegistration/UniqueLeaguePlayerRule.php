<?php

namespace App\Rules\Administration\League\LeagueRegistration;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueLeaguePlayerRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Retrieve the league_id and player_id from the request.
        $league_id = request('league_id');
        $player_id = request('player_id');

        // Check if the combination of league_id and player_id is unique in the league_player table.
        $count = DB::table('league_player')
            ->where('league_id', $league_id)
            ->where('player_id', $player_id)
            ->count();

        // If the count is greater than 0, it means the combination is not unique, so fail the validation.
        if ($count > 0) {
            $fail("The selected player has already been registered for this league.");
        }
    }
}
