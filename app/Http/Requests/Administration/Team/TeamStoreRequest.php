<?php

namespace App\Http\Requests\Administration\Team;

use Illuminate\Foundation\Http\FormRequest;

class TeamStoreRequest extends FormRequest
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
            'team_id' => 'required|string|unique:teams,team_id',
            'event_id' => 'required|exists:events,id|integer',
            'division_id' => 'required|exists:divisions,id|integer',
            'coach_id' => 'nullable|exists:coaches,id|integer',
            'name' => 'required|string|max:100',
            'gender' => 'required|in:Male,Female,Other',
            'maximum_players' => 'required|integer',
            'description' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ];
    }
}
