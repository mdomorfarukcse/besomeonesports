<?php

namespace App\Http\Requests\Administration\League;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class LeagueStoreRequest extends FormRequest
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
            'season_id'         => ['required', 'exists:seasons,id'],
            'sport_id'          => ['required', 'exists:sports,id'],
            'name' => [
                'required', 
                'string',
                'max:100',
                Rule::unique('leagues')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'registration_fee'  => ['required', 'numeric', 'between:0,999999.99'],
            'start'             => ['required', 'date'],
            'end'               => ['required', 'date', 'after_or_equal:start'],
            'description'       => ['required', 'string'],
            'status'            => ['required', 'in:Active,Inactive'],

            // Add validation for the pivot table (division_league)
            'divisions'         => ['required', 'array'],
            'divisions.*'       => ['exists:divisions,id'],

            // Add validation for the pivot table (league_venue)
            'venues'            => ['nullable', 'array'],
            'venues.*'          => ['exists:venues,id'],

            // Add validation for the pivot table (league_referee)
            // 'referees'            => ['required', 'array'],
            // 'referees.*'          => ['exists:users,id'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'status.in'             => 'The Status should be Active or Inactive only.',
            'divisions.required'    => 'At least one division must be selected.',
            'divisions.array'       => 'Invalid format for divisions.',
            'divisions.*.exists'    => 'Selected division(s) do not exist.',
            // 'venues.required'       => 'At least one venue must be selected.',
            'venues.array'          => 'Invalid format for venues.',
            'venues.*.exists'       => 'Selected venue(s) do not exist.',
            // 'referees.required'       => 'At least one referee must be selected.',
            // 'referees.array'          => 'Invalid format for referees.',
            // 'referees.*.exists'       => 'Selected referee(s) do not exist.',
        ];
    }
}
