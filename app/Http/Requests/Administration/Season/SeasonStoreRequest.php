<?php

namespace App\Http\Requests\Administration\Season;

use Illuminate\Foundation\Http\FormRequest;

class SeasonStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:sports,name'],
            'year' => ['required'],
            'start' => ['required', 'date', 'date_format:Y-m-d'],
            'end' => ['required', 'date', 'date_format:Y-m-d'],
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
            'status.in' => 'The Status should be Active or Inactive only.',
        ];
    }
}
