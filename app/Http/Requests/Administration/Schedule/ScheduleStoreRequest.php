<?php

namespace App\Http\Requests\Administration\Schedule;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ScheduleStoreRequest extends FormRequest
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
            'event_id' => 'required|exists:events,id',
            'venue_id' => 'required|exists:venues,id',
            'court_id' => 'required|exists:courts,id',
            'date' => 'required|date|after_or_equal:today',
            'start' => 'required|date_format:H:i',
            'end' => [
                'required',
                'date_format:H:i',
                Rule::unique('schedules')->where(function ($query) {
                    return $query->where('venue_id', $this->input('venue_id'))
                        ->where('date', $this->input('date'))
                        ->where('court_id', $this->input('court_id'))
                        ->where('end', $this->input('end'));
                })->ignore($this->route('schedule')),
            ],
            'teams' => [
                'required',
                'array',
                'size:2', // Exactly two teams are required
                Rule::distinct('teams'), // Ensure that the teams are distinct (not the same)
                Rule::exists('teams', 'id')->whereIn('id', $this->input('teams')),
            ],
        ];
    }

    public function messages()
    {
        return [
            'end.unique' => 'A schedule with the same venue, date, court, and end time already exists.',
            'teams.size' => 'Exactly two teams are required.',
            'teams.distinct' => 'The selected teams must be different.',
            'teams.exists' => 'One or more selected teams do not exist.',
        ];
    }
}
