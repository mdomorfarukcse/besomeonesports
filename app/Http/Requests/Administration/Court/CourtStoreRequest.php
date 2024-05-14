<?php

namespace App\Http\Requests\Administration\Court;

use Illuminate\Foundation\Http\FormRequest;

class CourtStoreRequest extends FormRequest
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
            'venue_id'  => 'required|exists:venues,id',
            'name'      => 'required|max:100|unique:courts,name,NULL,id,venue_id,' . $this->venue_id,
        ];
    }
}
