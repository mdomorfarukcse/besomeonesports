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
            'password' => ['required', 'string', 'min:8'],
            "first_name" => ['required', 'max:50'],
            "last_name" => ['required', 'max:50'],
            "birthdate" => ['required', 'date', 'date_format:Y-m-d'],
            "phone_number" => ['required', 'string', 'max:20', 'unique:coaches,phone_number'],
            "city" => ['required', 'string', 'max:50'],
            "state" => ['required', 'string', 'max:50'],
            "postal_code" => ['required', 'string', 'max:10'],
            "street_address" => ['required', 'string', 'max:100'],
            "sport_of_interests" => ['required', 'array'],
            "grade_of_interests" => ['required', 'array'],
        ];
    }
}
