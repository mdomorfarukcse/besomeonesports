<?php

namespace App\Http\Requests\Administration\UserManagement\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
        $adminId = $this->route('admin')->id;
        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => [
                'sometimes',
                'required',
                'string',
                'email',
                Rule::unique('users')->ignore($adminId),
            ],
            'birthdate' => ['sometimes', 'date'],
            'contact_number' => ['sometimes', 'string', 'max:20'],
            'address' => ['sometimes', 'string'],
            'city' => ['sometimes', 'string', 'max:50'],
            'state' => ['sometimes', 'string', 'max:50'],
            'postal_code' => ['sometimes', 'string', 'max:10'],
        ];
    }
}
