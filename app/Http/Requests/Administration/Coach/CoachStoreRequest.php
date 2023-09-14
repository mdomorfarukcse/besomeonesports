<?php

namespace App\Http\Requests\Administration\Coach;

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
            'coach_id' => ['required', 'string', 'unique:coaches,coach_id'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            "position" => ['required'],
            "status" => ['required','in:Active,Inactive,Banned'],
            "first_name" => ['required', 'max:50'],
            "middle_name" => ['nullable', 'string', 'max:50'],
            "last_name" => ['required', 'max:50'],
            "birthdate" => ['required', 'date', 'date_format:Y-m-d'],
            "phone_number" => ['required', 'string', 'max:20'],
            "usab_license_no" => ['required', 'string', 'max:20'],
            "city" => ['required', 'string', 'max:50'],
            "state" => ['required', 'string', 'max:50'],
            "postal_code" => ['required', 'string', 'max:10'],
            "street_address" => ['required', 'string', 'max:100'],
            "extended_address" => ['string', 'max:100'],
            "note" => ['string'],
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
            'coach_id.unique' => 'The Coach ID Already exists. It should be Unique.',
            'status.in' => 'The Status should be Active or Inactive only.',
        ];
    }
}
