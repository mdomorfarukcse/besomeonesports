<?php

namespace App\Http\Requests\Administration\Sport;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SportStoreRequest extends FormRequest
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
            'name' => [
                'required', 
                'string',
                Rule::unique('sports')->where(function ($query) {
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
            'status.in' => 'The Status should be Active or Inactive only.',
        ];
    }
}
