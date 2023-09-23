<?php

namespace App\Http\Requests\Administration\UserManagement\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birthdate' => ['required', 'date'],
            'contact_number' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string', 'max:50'],
            'state' => ['required', 'string', 'max:50'],
            'postal_code' => ['required', 'string', 'max:10'],
        ];
    }
}
