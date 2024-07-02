<?php

namespace App\Imports\Administration;

use App\Models\Sport\Sport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class SeasonsImport implements ToCollection, WithHeadingRow, WithValidation
{
    public function collection(Collection $rows)
    {
        // dd($rows);
        foreach ($rows as $row) {
            Sport::updateOrCreate(
                ['name' => $row['name']],
                [
                    'description' => $row['description'],
                    'status' => 'Active',
                ]
            );
        }
    }

    public function rules(): array
    {
        return [
            '*.name' => [
                'required',
                'string',
                Rule::unique('sports', 'name')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            '*.description' => 'required|string',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'name.unique' => 'The Season name (:input) is already registered on ' . config('app.name') . '. Please update your file and try again.',
        ];
    }

}