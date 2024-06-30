<?php

namespace App\Exports\Administration;

use App\Models\Sport\Sport;
use App\Exports\Global\BaseExportSettings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SportsExport extends BaseExportSettings implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sport::select(['name', 'status', 'description'])->get();
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
            'Status',
            'Description',
        ];
    }
}
