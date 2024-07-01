<?php

namespace App\Imports\Administration;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TeamsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }
}
