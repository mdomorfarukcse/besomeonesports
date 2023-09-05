<?php

namespace App\Rules\Administration\Event\EventRegistration;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueEventPlayerRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Retrieve the event_id and player_id from the request.
        $event_id = request('event_id');
        $player_id = request('player_id');

        // Check if the combination of event_id and player_id is unique in the event_player table.
        $count = DB::table('event_player')
            ->where('event_id', $event_id)
            ->where('player_id', $player_id)
            ->count();

        // If the count is greater than 0, it means the combination is not unique, so fail the validation.
        if ($count > 0) {
            $fail("The selected player has already been registered for this event.");
        }
    }
}
