<?php

namespace App\Http\Requests\Administration\Season;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SeasonUpdateRequest extends FormRequest
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
        $seasonId = $this->route('season')->id;

        return [
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('seasons')->ignore($seasonId)->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'year' => ['required', 'numeric'],
            'start' => ['required', 'date', 'date_format:Y-m-d'],
            'end' => ['required', 'date', 'date_format:Y-m-d', 'after:start'],
            "status" => ['required','in:Active,Inactive'],
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
            'name.unique' => 'The Season Name should be Unique.',
            'status.in' => 'The Status should be Active or Inactive only.',
        ];
    }
}
