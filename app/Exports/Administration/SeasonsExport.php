<?php

namespace App\Exports\Administration;

use App\Exports\Global\BaseExportSettings;
use App\Models\Season\Season;
use Maatwebsite\Excel\Concerns\FromCollection;

class SeasonsExport extends BaseExportSettings implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Season::select(['name', 'year', 'start','end', 'status'])->orderBy('created_at', 'desc')->get();
    }

    /**
     * Define the headings for the export.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Name',
            'Year',
            'Start Date',
            'End Date',
            'Status'
        ];
    }
}
