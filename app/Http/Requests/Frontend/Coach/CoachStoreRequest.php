<?php

namespace App\Http\Requests\Frontend\Coach;

use Illuminate\Foundation\Http\FormRequest;

class CoachStoreRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:users,email'],
            "first_name" => ['required', 'max:50'],
            "last_name" => ['required', 'max:50'],
            "phone_number" => ['required', 'string', 'max:20', 'unique:coaches,phone_number'],
            "sport_of_interests" => ['required', 'array'],
            "grade_of_interests" => ['required', 'array'],
        ];
    }
}
