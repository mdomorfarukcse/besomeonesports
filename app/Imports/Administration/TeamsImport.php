<?php

namespace App\Imports\Administration;

use App\Models\Team\Team;
use App\Models\League\League;
use App\Models\Division\Division;
use App\Models\Coach\Coach;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class TeamsImport implements ToCollection, WithHeadingRow, WithValidation
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Fetch the foreign IDs based on the names provided in the CSV
            $league = League::where('name', $row['league_name'])->first();
            $division = Division::where('name', $row['division_name'])->first();
            $coach = Coach::where('coach_id', $row['coach_id'])->first();

            Team::updateOrCreate(
                ['team_id' => str_pad(Team::max('id') + 1, 5, '0', STR_PAD_LEFT)],
                [
                    'name' => $row['team_name'],
                    'gender' => $row['gender'],
                    'league_id' => $league ? $league->id : null,
                    'division_id' => $division ? $division->id : null,
                    'coach_id' => $coach ? $coach->id : null,
                    'description' => $row['description']
                ]
            );
        }
    }

    public function rules(): array
    {
        return [
            '*.team_id' => [
                'string',
                Rule::unique('teams', 'team_id')->whereNull('deleted_at'),
            ],
            '*.team_name' => 'required|string|max:100',
            '*.gender' => 'required|in:Male,Female,"Male & Female",Other',
            '*.league_name' => 'required|string|exists:leagues,name',
            '*.division_name' => 'required|string|exists:divisions,name',
            '*.coach_id' => 'nullable|string|exists:coaches,coach_id',
            '*.description' => 'nullable|string'
        ];
    }

    public function customValidationMessages()
    {
        return [
            'team_id.unique' => 'The team ID (:input) is already registered on ' . config('app.name') . '. Please update your file and try again.',
            'league_name.exists' => 'The selected league name (:input) does not exist on ' . config('app.name') . '. Please update your file and try again.',
            'division_name.exists' => 'The selected division name (:input) does not exist on ' . config('app.name') . '. Please update your file and try again.',
            'coach_id.exists' => 'The selected coach ID (:input) does not exist on ' . config('app.name') . '. Please update your file and try again.',
        ];
    }
}
