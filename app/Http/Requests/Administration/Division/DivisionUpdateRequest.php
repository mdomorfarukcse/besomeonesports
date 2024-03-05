<?php

namespace App\Http\Requests\Administration\Division;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DivisionUpdateRequest extends FormRequest
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
        $divisionId = $this->route('division')->id;

        return [
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('divisions')->ignore($divisionId),
            ],
            "gender" => ['required','in:Male,Female,Co-Ed'],
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
            'name.unique' => 'The Division Name should be Unique.',
            'gender.in' => 'The Gender should be Male, Female or Co-Ed only.',
            'status.in' => 'The Status should be Active or Inactive only.',
        ];
    }
}
