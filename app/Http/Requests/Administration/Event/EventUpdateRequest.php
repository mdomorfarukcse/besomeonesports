<?php

namespace App\Http\Requests\Administration\Event;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
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
        $eventId = $this->route('event')->id;

        return [
            'season_id' => ['required', 'exists:seasons,id'],
            'sport_id' => ['required', 'exists:sports,id'],
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('events')->ignore($eventId),
            ],
            'start' => ['required', 'date'],
            'end' => ['required', 'date', 'after_or_equal:start'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:Active,Inactive'],
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
            'status.in' => 'The Status should be Active or Inactive only.',
        ];
    }
}
