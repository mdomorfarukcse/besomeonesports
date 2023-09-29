<?php

namespace App\Http\Requests\Administration\Sport;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SportUpdateRequest extends FormRequest
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
        $sportId = $this->route('sport')->id;
        return [
            'name' => [
                'required',
                'string',
                Rule::unique('sports')->ignore($sportId)->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
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
            'name.unique' => 'The Sport Name should be Unique.',
            'status.in' => 'The Status should be Active or Inactive only.',
        ];
    }
}
