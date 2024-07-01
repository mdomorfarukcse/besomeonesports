<?php

namespace App\Exports\Administration;

use App\Models\Team\Team;
use App\Exports\Global\BaseExportSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TeamsExport extends BaseExportSettings implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Team::with(['league', 'players', 'division'])
                    ->orderBy('created_at', 'desc')
                    ->get()
                    ->map(function ($team) {
                        return [
                            'team_id' => $team->team_id,
                            'name' => $team->name,
                            'gender' => $team->gender,
                            'league' => $team->league->name ?? 'N/A',
                            'players_count' => $team->players->count(),
                            'division' => $team->division->name ?? 'N/A',
                            'status' => $team->status
                        ];
                    });
    }

    /**
     * Return the headings for the export.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'TEAM-ID',
            'Name',
            'Gender',
            'League',
            'Total Players',
            'Division',
            'Status'
        ];
    }
}